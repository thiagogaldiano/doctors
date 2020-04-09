<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Hash;
use App\Models\Patients;
use App\Models\Roles;
use App\Models\RoleUser;
use App\Models\PermissionRole;
use App\Models\Users;
use Illuminate\Support\Arr;

class UsersController extends AppBaseController
{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->usersRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Roles::get()->pluck("name","id");
        return view('users.create')->with('roles',$roles);
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password'
        ]);

        $input = $request->all();

        $role = config('roles.models.role')::find($input['roles_id']);
        $permissions_role = PermissionRole::where('role_id',$input['roles_id'])->get();

        if (Users::where('email', '=', $input['email'])->count() === 0) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => $input['name'],
                'email'    => $input['email'],
                'password' => bcrypt($input['password']),
                'api_token' => \Illuminate\Support\Str::random(60)
            ]);

            $newUser->attachRole($role);
            foreach($permissions_role as $permission_role){
                $permission = config('roles.models.permission')::find($permission_role->permission_id);
                $newUser->attachPermission($permission);
            }

        }else{
            Flash::error('E-mail já cadastrado!');
        }

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $roleuser = RoleUser::where('user_id',$id)->first();

        $roles = Roles::get()->pluck("name","id");

        return view('users.edit')->with('users', $users)->with('roles',$roles)->with('role_id',$roleuser->role_id);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param int $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        if($request['password']){
            $request->validate([
                'name' => 'required',
                'email' => 'email|unique:users,email,'.$id,
                'password_confirmation' => 'required|same:password'
            ]);
        }else{
            $request->validate([
                'name' => 'required',
                'email' => 'email'
            ]);
        }


        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $users->name = $request['name'];
        $users->email = $request['email'];
        if($request['password']){
            $users->password = Hash::make($request['password']);;
        }
        $users->save();

        $role = config('roles.models.role')::find($request['roles_id']);
        $user = config('roles.models.defaultUser')::find($id);
        $user->syncRoles($role);

        if($request['roles_id'] != 1) {

            return redirect()->route('login');

        }else{
            //$users = $this->usersRepository->update($request->all(), $id);

            Flash::success('Usuário alterado com sucesso!');

            return redirect(route('users.index'));
        }


    }

    /**
     * Remove the specified Users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Usuário excluído com sucesso!');

        return redirect(route('users.index'));
    }
}

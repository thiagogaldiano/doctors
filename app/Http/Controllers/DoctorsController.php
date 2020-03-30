<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDoctorsRequest;
use App\Http\Requests\UpdateDoctorsRequest;
use App\Models\Doctors;
use App\Repositories\DoctorsRepository;
use App\Models\Specialties;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DoctorsController extends AppBaseController
{
    /** @var  DoctorsRepository */
    private $doctorsRepository;

    public function __construct(DoctorsRepository $doctorsRepo)
    {
        $this->doctorsRepository = $doctorsRepo;
    }

    /**
     * Display a listing of the Doctors.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $doctors = $this->doctorsRepository->all();

        return view('doctors.index')
            ->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new Doctors.
     *
     * @return Response
     */
    public function create()
    {
        $specialties = Specialties::get()->pluck("description","id");
        return view('doctors.create',compact('specialties'));
    }

    /**
     * Store a newly created Doctors in storage.
     *
     * @param CreateDoctorsRequest $request
     *
     * @return Response
     */
    public function store(CreateDoctorsRequest $request)
    {
        $input = $request->all();

        $doctors = $this->doctorsRepository->create($input);

        Flash::success('Médico cadastrado com sucesso!');

        return redirect(route('doctors.index'));
    }

    /**
     * Display the specified Doctors.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $doctors = $this->doctorsRepository->find($id);

        if (empty($doctors)) {
            Flash::error('Doctors not found');

            return redirect(route('doctors.index'));
        }

        return view('doctors.show',compact('doctors'));
    }

    /**
     * Show the form for editing the specified Doctors.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $doctors = $this->doctorsRepository->find($id);
        $specialties = Specialties::get()->pluck("description","id");

        if (empty($doctors)) {
            Flash::error('Doctors not found');

            return redirect(route('doctors.index'));
        }

        return view('doctors.edit',compact('doctors','specialties'));
    }

    /**
     * Update the specified Doctors in storage.
     *
     * @param int $id
     * @param UpdateDoctorsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDoctorsRequest $request)
    {
        $doctors = $this->doctorsRepository->find($id);

        if (empty($doctors)) {
            Flash::error('Doctors not found');

            return redirect(route('doctors.index'));
        }

        $doctors = $this->doctorsRepository->update($request->all(), $id);

        Flash::success('Médico alterado com sucesso!');

        return redirect(route('doctors.index'));
    }

    /**
     * Remove the specified Doctors from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $doctors = $this->doctorsRepository->find($id);

        if (empty($doctors)) {
            Flash::error('Doctors not found');

            return redirect(route('doctors.index'));
        }

        $this->doctorsRepository->delete($id);

        Flash::success('Médico excluído com sucesso!');

        return redirect(route('doctors.index'));
    }

    public function ajax(Request $request){

        if($request->term != '')
            $doctors = Doctors::select(array('id','name as text'))->where('name','like',$request->term.'%')->get();
        else
            $doctors = null;

        return json_encode($doctors);
    }
}

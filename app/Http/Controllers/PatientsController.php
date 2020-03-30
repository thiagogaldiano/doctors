<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Repositories\PatientsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Patients;

class PatientsController extends AppBaseController
{
    /** @var  PatientsRepository */
    private $patientsRepository;

    public function __construct(PatientsRepository $patientsRepo)
    {
        $this->patientsRepository = $patientsRepo;
    }

    /**
     * Display a listing of the Patients.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $patients = $this->patientsRepository->all();

        return view('patients.index')
            ->with('patients', $patients);
    }

    /**
     * Show the form for creating a new Patients.
     *
     * @return Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created Patients in storage.
     *
     * @param CreatePatientsRequest $request
     *
     * @return Response
     */
    public function store(CreatePatientsRequest $request)
    {
        $input = $request->all();

        $patients = $this->patientsRepository->create($input);

        Flash::success('Paciente cadastrado com sucesso!');

        return redirect(route('patients.index'));
    }

    /**
     * Display the specified Patients.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $patients = $this->patientsRepository->find($id);

        if (empty($patients)) {
            Flash::error('Patients not found');

            return redirect(route('patients.index'));
        }

        return view('patients.show')->with('patients', $patients);
    }

    /**
     * Show the form for editing the specified Patients.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $patients = $this->patientsRepository->find($id);

        if (empty($patients)) {
            Flash::error('Patients not found');

            return redirect(route('patients.index'));
        }

        return view('patients.edit')->with('patients', $patients);
    }

    /**
     * Update the specified Patients in storage.
     *
     * @param int $id
     * @param UpdatePatientsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePatientsRequest $request)
    {
        $patients = $this->patientsRepository->find($id);

        if (empty($patients)) {
            Flash::error('Patients not found');

            return redirect(route('patients.index'));
        }

        $patients = $this->patientsRepository->update($request->all(), $id);

        Flash::success('Paciente alterado com sucesso!');

        return redirect(route('patients.index'));
    }

    /**
     * Remove the specified Patients from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $patients = $this->patientsRepository->find($id);

        if (empty($patients)) {
            Flash::error('Patients not found');

            return redirect(route('patients.index'));
        }

        $this->patientsRepository->delete($id);

        Flash::success('Paciente excluído com sucesso!');

        return redirect(route('patients.index'));
    }

    public function ajax(Request $request){

        if($request->term != '')
            $patients = Patients::select(array('id','name as text'))->where('name','like',$request->term.'%')->get();
        else
            $patients = null;

        return json_encode($patients);
    }
}

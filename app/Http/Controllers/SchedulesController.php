<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchedulesRequest;
use App\Http\Requests\UpdateSchedulesRequest;
use App\Repositories\SchedulesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Schedules;

class SchedulesController extends AppBaseController
{
    /** @var  SchedulesRepository */
    private $schedulesRepository;

    public function __construct(SchedulesRepository $schedulesRepo)
    {
        $this->schedulesRepository = $schedulesRepo;
    }

    /**
     * Display a listing of the Schedules.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $schedules = $this->schedulesRepository->all();

        return view('schedules.index')
            ->with('schedules', $schedules);
    }

    /**
     * Show the form for creating a new Schedules.
     *
     * @return Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created Schedules in storage.
     *
     * @param CreateSchedulesRequest $request
     *
     * @return Response
     */
    public function store(CreateSchedulesRequest $request)
    {
        $input = $request->all();
        $input['consultation_date'] = implode("-",array_reverse(explode("/",substr($request->consultation_date,0,10)))).' '.substr($request->consultation_date,11,9);
        $consultation_date_verify_start = date('Y-m-d H', strtotime($input['consultation_date'])).':00:00';
        $consultation_date_verify_end = date('Y-m-d H', strtotime($input['consultation_date'])).':59:59';

        //Verify date schedule
        $verifyschedule = Schedules::whereBetween('consultation_date',[$consultation_date_verify_start,$consultation_date_verify_end])->where('doctors_id',$request->doctors_id)->count();

        if(!$verifyschedule){
            $schedules = $this->schedulesRepository->create($input);
            Flash::success('Agendamento cadastrado com sucesso!');
        }else{
            Flash::error('Já existe um agendamento nesta hora!');
        }

        return redirect(route('schedules.index'));
    }

    /**
     * Display the specified Schedules.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $schedules = $this->schedulesRepository->find($id);

        if (empty($schedules)) {
            Flash::error('Schedules not found');

            return redirect(route('schedules.index'));
        }

        return view('schedules.show')->with('schedules', $schedules);
    }

    /**
     * Show the form for editing the specified Schedules.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $schedules = $this->schedulesRepository->find($id);

        if (empty($schedules)) {
            Flash::error('Schedules not found');

            return redirect(route('schedules.index'));
        }

        return view('schedules.edit')->with('schedules', $schedules);
    }

    /**
     * Update the specified Schedules in storage.
     *
     * @param int $id
     * @param UpdateSchedulesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchedulesRequest $request)
    {
        $schedules = $this->schedulesRepository->find($id);

        if (empty($schedules)) {
            Flash::error('Schedules not found');

            return redirect(route('schedules.index'));
        }

        $input = $request->all();
        $input['consultation_date'] = implode("-",array_reverse(explode("/",substr($request->consultation_date,0,10)))).' '.substr($request->consultation_date,11,9);
        $consultation_date_verify_start = date('Y-m-d H', strtotime($input['consultation_date'])).':00:00';
        $consultation_date_verify_end = date('Y-m-d H', strtotime($input['consultation_date'])).':59:59';

        //Verify date schedule
        $verifyschedule = Schedules::whereBetween('consultation_date',[$consultation_date_verify_start,$consultation_date_verify_end])->where('doctors_id',$request->doctors_id)->count();

        if(!$verifyschedule) {
            $schedules = $this->schedulesRepository->update($input, $id);
            Flash::success('Agendamento alterado com sucesso!');
        }else{
            Flash::error('Já existe um agendamento nesta hora!');
        }

        return redirect(route('schedules.index'));
    }

    /**
     * Remove the specified Schedules from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $schedules = $this->schedulesRepository->find($id);

        if (empty($schedules)) {
            Flash::error('Schedules not found');

            return redirect(route('schedules.index'));
        }

        $this->schedulesRepository->delete($id);

        Flash::success('Agendamento excluído com sucesso!');

        return redirect(route('schedules.index'));
    }
}

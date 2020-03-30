<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpecialtiesRequest;
use App\Http\Requests\UpdateSpecialtiesRequest;
use App\Repositories\SpecialtiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SpecialtiesController extends AppBaseController
{
    /** @var  SpecialtiesRepository */
    private $specialtiesRepository;

    public function __construct(SpecialtiesRepository $specialtiesRepo)
    {
        $this->specialtiesRepository = $specialtiesRepo;
    }

    /**
     * Display a listing of the Specialties.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $specialties = $this->specialtiesRepository->all();

        return view('specialties.index')
            ->with('specialties', $specialties);
    }

    /**
     * Show the form for creating a new Specialties.
     *
     * @return Response
     */
    public function create()
    {
        return view('specialties.create');
    }

    /**
     * Store a newly created Specialties in storage.
     *
     * @param CreateSpecialtiesRequest $request
     *
     * @return Response
     */
    public function store(CreateSpecialtiesRequest $request)
    {
        $input = $request->all();

        $specialties = $this->specialtiesRepository->create($input);

        Flash::success('Esppecialidade cadastrada com sucesso!');

        return redirect(route('specialties.index'));
    }

    /**
     * Display the specified Specialties.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $specialties = $this->specialtiesRepository->find($id);

        if (empty($specialties)) {
            Flash::error('Specialties not found');

            return redirect(route('specialties.index'));
        }

        return view('specialties.show')->with('specialties', $specialties);
    }

    /**
     * Show the form for editing the specified Specialties.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $specialties = $this->specialtiesRepository->find($id);

        if (empty($specialties)) {
            Flash::error('Specialties not found');

            return redirect(route('specialties.index'));
        }

        return view('specialties.edit')->with('specialties', $specialties);
    }

    /**
     * Update the specified Specialties in storage.
     *
     * @param int $id
     * @param UpdateSpecialtiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpecialtiesRequest $request)
    {
        $specialties = $this->specialtiesRepository->find($id);

        if (empty($specialties)) {
            Flash::error('Specialties not found');

            return redirect(route('specialties.index'));
        }

        $specialties = $this->specialtiesRepository->update($request->all(), $id);

        Flash::success('Especialidade alterada com sucesso!');

        return redirect(route('specialties.index'));
    }

    /**
     * Remove the specified Specialties from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $specialties = $this->specialtiesRepository->find($id);

        if (empty($specialties)) {
            Flash::error('Specialties not found');

            return redirect(route('specialties.index'));
        }

        $this->specialtiesRepository->delete($id);

        Flash::success('Especialidade excluída com sucesso!');

        return redirect(route('specialties.index'));
    }
}

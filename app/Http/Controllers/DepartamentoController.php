<?php

namespace App\Http\Controllers;

use App\DataTables\DepartamentoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Models\Departamento;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DepartamentoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Departamentos')->only(['show']);
        $this->middleware('permission:Crear Departamentos')->only(['create','store']);
        $this->middleware('permission:Editar Departamentos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Departamentos')->only(['destroy']);
    }

    /**
     * Display a listing of the Departamento.
     *
     * @param DepartamentoDataTable $departamentoDataTable
     * @return Response
     */
    public function index(DepartamentoDataTable $departamentoDataTable)
    {
        return $departamentoDataTable->render('departamentos.index');
    }

    /**
     * Show the form for creating a new Departamento.
     *
     * @return Response
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created Departamento in storage.
     *
     * @param CreateDepartamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartamentoRequest $request)
    {
        $input = $request->all();

        /** @var Departamento $departamento */
        $departamento = Departamento::create($input);

        Flash::success('Departamento guardado exitosamente.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Display the specified Departamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Departamento $departamento */
        $departamento = Departamento::find($id);

        if (empty($departamento)) {
            Flash::error('Departamento no encontrado');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.show')->with('departamento', $departamento);
    }

    /**
     * Show the form for editing the specified Departamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Departamento $departamento */
        $departamento = Departamento::find($id);

        if (empty($departamento)) {
            Flash::error('Departamento no encontrado');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.edit')->with('departamento', $departamento);
    }

    /**
     * Update the specified Departamento in storage.
     *
     * @param  int              $id
     * @param UpdateDepartamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartamentoRequest $request)
    {
        /** @var Departamento $departamento */
        $departamento = Departamento::find($id);

        if (empty($departamento)) {
            Flash::error('Departamento no encontrado');

            return redirect(route('departamentos.index'));
        }

        $departamento->fill($request->all());
        $departamento->save();

        Flash::success('Departamento actualizado con éxito.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified Departamento from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Departamento $departamento */
        $departamento = Departamento::find($id);

        if (empty($departamento)) {
            Flash::error('Departamento no encontrado');

            return redirect(route('departamentos.index'));
        }

        $departamento->delete();

        Flash::success('Departamento deleted successfully.');

        return redirect(route('departamentos.index'));
    }
}

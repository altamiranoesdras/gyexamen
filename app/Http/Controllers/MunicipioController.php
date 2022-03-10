<?php

namespace App\Http\Controllers;

use App\DataTables\MunicipioDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;
use App\Models\Municipio;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MunicipioController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Municipios')->only(['show']);
        $this->middleware('permission:Crear Municipios')->only(['create','store']);
        $this->middleware('permission:Editar Municipios')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Municipios')->only(['destroy']);
    }

    /**
     * Display a listing of the Municipio.
     *
     * @param MunicipioDataTable $municipioDataTable
     * @return Response
     */
    public function index(MunicipioDataTable $municipioDataTable)
    {
        return $municipioDataTable->render('municipios.index');
    }

    /**
     * Show the form for creating a new Municipio.
     *
     * @return Response
     */
    public function create()
    {
        return view('municipios.create');
    }

    /**
     * Store a newly created Municipio in storage.
     *
     * @param CreateMunicipioRequest $request
     *
     * @return Response
     */
    public function store(CreateMunicipioRequest $request)
    {
        $input = $request->all();

        /** @var Municipio $municipio */
        $municipio = Municipio::create($input);

        Flash::success('Municipio guardado exitosamente.');

        return redirect(route('municipios.index'));
    }

    /**
     * Display the specified Municipio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Municipio $municipio */
        $municipio = Municipio::find($id);

        if (empty($municipio)) {
            Flash::error('Municipio no encontrado');

            return redirect(route('municipios.index'));
        }

        return view('municipios.show')->with('municipio', $municipio);
    }

    /**
     * Show the form for editing the specified Municipio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Municipio $municipio */
        $municipio = Municipio::find($id);

        if (empty($municipio)) {
            Flash::error('Municipio no encontrado');

            return redirect(route('municipios.index'));
        }

        return view('municipios.edit')->with('municipio', $municipio);
    }

    /**
     * Update the specified Municipio in storage.
     *
     * @param  int              $id
     * @param UpdateMunicipioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMunicipioRequest $request)
    {
        /** @var Municipio $municipio */
        $municipio = Municipio::find($id);

        if (empty($municipio)) {
            Flash::error('Municipio no encontrado');

            return redirect(route('municipios.index'));
        }

        $municipio->fill($request->all());
        $municipio->save();

        Flash::success('Municipio actualizado con éxito.');

        return redirect(route('municipios.index'));
    }

    /**
     * Remove the specified Municipio from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Municipio $municipio */
        $municipio = Municipio::find($id);

        if (empty($municipio)) {
            Flash::error('Municipio no encontrado');

            return redirect(route('municipios.index'));
        }

        $municipio->delete();

        Flash::success('Municipio deleted successfully.');

        return redirect(route('municipios.index'));
    }
}

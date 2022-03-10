<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepartamentoAPIRequest;
use App\Http\Requests\API\UpdateDepartamentoAPIRequest;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DepartamentoController
 * @package App\Http\Controllers\API
 */

class DepartamentoAPIController extends AppBaseController
{
    /**
     * Display a listing of the Departamento.
     * GET|HEAD /departamentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Departamento::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $departamentos = $query->get();

        return $this->sendResponse($departamentos->toArray(), 'Departamentos retrieved successfully');
    }

    /**
     * Store a newly created Departamento in storage.
     * POST /departamentos
     *
     * @param CreateDepartamentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartamentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Departamento $departamento */
        $departamento = Departamento::create($input);

        return $this->sendResponse($departamento->toArray(), 'Departamento guardado exitosamente');
    }

    /**
     * Display the specified Departamento.
     * GET|HEAD /departamentos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Departamento $departamento */
        $departamento = Departamento::find($id);

        if (empty($departamento)) {
            return $this->sendError('Departamento no encontrado');
        }

        return $this->sendResponse($departamento->toArray(), 'Departamento retrieved successfully');
    }

    /**
     * Update the specified Departamento in storage.
     * PUT/PATCH /departamentos/{id}
     *
     * @param int $id
     * @param UpdateDepartamentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartamentoAPIRequest $request)
    {
        /** @var Departamento $departamento */
        $departamento = Departamento::find($id);

        if (empty($departamento)) {
            return $this->sendError('Departamento no encontrado');
        }

        $departamento->fill($request->all());
        $departamento->save();

        return $this->sendResponse($departamento->toArray(), 'Departamento actualizado con éxito');
    }

    /**
     * Remove the specified Departamento from storage.
     * DELETE /departamentos/{id}
     *
     * @param int $id
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
            return $this->sendError('Departamento no encontrado');
        }

        $departamento->delete();

        return $this->sendSuccess('Departamento deleted successfully');
    }
}

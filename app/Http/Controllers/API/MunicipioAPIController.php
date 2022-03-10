<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMunicipioAPIRequest;
use App\Http\Requests\API\UpdateMunicipioAPIRequest;
use App\Models\Municipio;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MunicipioController
 * @package App\Http\Controllers\API
 */

class MunicipioAPIController extends AppBaseController
{
    /**
     * Display a listing of the Municipio.
     * GET|HEAD /municipios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Municipio::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $municipios = $query->get();

        return $this->sendResponse($municipios->toArray(), 'Municipios retrieved successfully');
    }

    /**
     * Store a newly created Municipio in storage.
     * POST /municipios
     *
     * @param CreateMunicipioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMunicipioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Municipio $municipio */
        $municipio = Municipio::create($input);

        return $this->sendResponse($municipio->toArray(), 'Municipio guardado exitosamente');
    }

    /**
     * Display the specified Municipio.
     * GET|HEAD /municipios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Municipio $municipio */
        $municipio = Municipio::find($id);

        if (empty($municipio)) {
            return $this->sendError('Municipio no encontrado');
        }

        return $this->sendResponse($municipio->toArray(), 'Municipio retrieved successfully');
    }

    /**
     * Update the specified Municipio in storage.
     * PUT/PATCH /municipios/{id}
     *
     * @param int $id
     * @param UpdateMunicipioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMunicipioAPIRequest $request)
    {
        /** @var Municipio $municipio */
        $municipio = Municipio::find($id);

        if (empty($municipio)) {
            return $this->sendError('Municipio no encontrado');
        }

        $municipio->fill($request->all());
        $municipio->save();

        return $this->sendResponse($municipio->toArray(), 'Municipio actualizado con éxito');
    }

    /**
     * Remove the specified Municipio from storage.
     * DELETE /municipios/{id}
     *
     * @param int $id
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
            return $this->sendError('Municipio no encontrado');
        }

        $municipio->delete();

        return $this->sendSuccess('Municipio deleted successfully');
    }
}

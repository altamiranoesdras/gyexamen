<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClienteProcutoAPIRequest;
use App\Http\Requests\API\UpdateClienteProcutoAPIRequest;
use App\Models\ClienteProcuto;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClienteProcutoController
 * @package App\Http\Controllers\API
 */

class ClienteProcutoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ClienteProcuto.
     * GET|HEAD /clienteProcutos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ClienteProcuto::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $clienteProcutos = $query->get();

        return $this->sendResponse($clienteProcutos->toArray(), 'Cliente Procutos retrieved successfully');
    }

    /**
     * Store a newly created ClienteProcuto in storage.
     * POST /clienteProcutos
     *
     * @param CreateClienteProcutoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteProcutoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ClienteProcuto $clienteProcuto */
        $clienteProcuto = ClienteProcuto::create($input);

        return $this->sendResponse($clienteProcuto->toArray(), 'Cliente Procuto guardado exitosamente');
    }

    /**
     * Display the specified ClienteProcuto.
     * GET|HEAD /clienteProcutos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ClienteProcuto $clienteProcuto */
        $clienteProcuto = ClienteProcuto::find($id);

        if (empty($clienteProcuto)) {
            return $this->sendError('Cliente Procuto no encontrado');
        }

        return $this->sendResponse($clienteProcuto->toArray(), 'Cliente Procuto retrieved successfully');
    }

    /**
     * Update the specified ClienteProcuto in storage.
     * PUT/PATCH /clienteProcutos/{id}
     *
     * @param int $id
     * @param UpdateClienteProcutoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteProcutoAPIRequest $request)
    {
        /** @var ClienteProcuto $clienteProcuto */
        $clienteProcuto = ClienteProcuto::find($id);

        if (empty($clienteProcuto)) {
            return $this->sendError('Cliente Procuto no encontrado');
        }

        $clienteProcuto->fill($request->all());
        $clienteProcuto->save();

        return $this->sendResponse($clienteProcuto->toArray(), 'ClienteProcuto actualizado con éxito');
    }

    /**
     * Remove the specified ClienteProcuto from storage.
     * DELETE /clienteProcutos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ClienteProcuto $clienteProcuto */
        $clienteProcuto = ClienteProcuto::find($id);

        if (empty($clienteProcuto)) {
            return $this->sendError('Cliente Procuto no encontrado');
        }

        $clienteProcuto->delete();

        return $this->sendSuccess('Cliente Procuto deleted successfully');
    }
}

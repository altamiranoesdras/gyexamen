<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductoTipoAPIRequest;
use App\Http\Requests\API\UpdateProductoTipoAPIRequest;
use App\Models\ProductoTipo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProductoTipoController
 * @package App\Http\Controllers\API
 */

class ProductoTipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ProductoTipo.
     * GET|HEAD /productoTipos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ProductoTipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $productoTipos = $query->get();

        return $this->sendResponse($productoTipos->toArray(), 'Producto Tipos retrieved successfully');
    }

    /**
     * Store a newly created ProductoTipo in storage.
     * POST /productoTipos
     *
     * @param CreateProductoTipoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductoTipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductoTipo $productoTipo */
        $productoTipo = ProductoTipo::create($input);

        return $this->sendResponse($productoTipo->toArray(), 'Producto Tipo guardado exitosamente');
    }

    /**
     * Display the specified ProductoTipo.
     * GET|HEAD /productoTipos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductoTipo $productoTipo */
        $productoTipo = ProductoTipo::find($id);

        if (empty($productoTipo)) {
            return $this->sendError('Producto Tipo no encontrado');
        }

        return $this->sendResponse($productoTipo->toArray(), 'Producto Tipo retrieved successfully');
    }

    /**
     * Update the specified ProductoTipo in storage.
     * PUT/PATCH /productoTipos/{id}
     *
     * @param int $id
     * @param UpdateProductoTipoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductoTipoAPIRequest $request)
    {
        /** @var ProductoTipo $productoTipo */
        $productoTipo = ProductoTipo::find($id);

        if (empty($productoTipo)) {
            return $this->sendError('Producto Tipo no encontrado');
        }

        $productoTipo->fill($request->all());
        $productoTipo->save();

        return $this->sendResponse($productoTipo->toArray(), 'ProductoTipo actualizado con éxito');
    }

    /**
     * Remove the specified ProductoTipo from storage.
     * DELETE /productoTipos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductoTipo $productoTipo */
        $productoTipo = ProductoTipo::find($id);

        if (empty($productoTipo)) {
            return $this->sendError('Producto Tipo no encontrado');
        }

        $productoTipo->delete();

        return $this->sendSuccess('Producto Tipo deleted successfully');
    }
}

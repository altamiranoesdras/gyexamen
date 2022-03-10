<?php

namespace App\Http\Controllers;

use App\DataTables\ProductoTipoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductoTipoRequest;
use App\Http\Requests\UpdateProductoTipoRequest;
use App\Models\ProductoTipo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductoTipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Producto Tipos')->only(['show']);
        $this->middleware('permission:Crear Producto Tipos')->only(['create','store']);
        $this->middleware('permission:Editar Producto Tipos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Producto Tipos')->only(['destroy']);
    }

    /**
     * Display a listing of the ProductoTipo.
     *
     * @param ProductoTipoDataTable $productoTipoDataTable
     * @return Response
     */
    public function index(ProductoTipoDataTable $productoTipoDataTable)
    {
        return $productoTipoDataTable->render('producto_tipos.index');
    }

    /**
     * Show the form for creating a new ProductoTipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('producto_tipos.create');
    }

    /**
     * Store a newly created ProductoTipo in storage.
     *
     * @param CreateProductoTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateProductoTipoRequest $request)
    {
        $input = $request->all();

        /** @var ProductoTipo $productoTipo */
        $productoTipo = ProductoTipo::create($input);

        Flash::success('Producto Tipo guardado exitosamente.');

        return redirect(route('productoTipos.index'));
    }

    /**
     * Display the specified ProductoTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductoTipo $productoTipo */
        $productoTipo = ProductoTipo::find($id);

        if (empty($productoTipo)) {
            Flash::error('Producto Tipo no encontrado');

            return redirect(route('productoTipos.index'));
        }

        return view('producto_tipos.show')->with('productoTipo', $productoTipo);
    }

    /**
     * Show the form for editing the specified ProductoTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ProductoTipo $productoTipo */
        $productoTipo = ProductoTipo::find($id);

        if (empty($productoTipo)) {
            Flash::error('Producto Tipo no encontrado');

            return redirect(route('productoTipos.index'));
        }

        return view('producto_tipos.edit')->with('productoTipo', $productoTipo);
    }

    /**
     * Update the specified ProductoTipo in storage.
     *
     * @param  int              $id
     * @param UpdateProductoTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductoTipoRequest $request)
    {
        /** @var ProductoTipo $productoTipo */
        $productoTipo = ProductoTipo::find($id);

        if (empty($productoTipo)) {
            Flash::error('Producto Tipo no encontrado');

            return redirect(route('productoTipos.index'));
        }

        $productoTipo->fill($request->all());
        $productoTipo->save();

        Flash::success('Producto Tipo actualizado con éxito.');

        return redirect(route('productoTipos.index'));
    }

    /**
     * Remove the specified ProductoTipo from storage.
     *
     * @param  int $id
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
            Flash::error('Producto Tipo no encontrado');

            return redirect(route('productoTipos.index'));
        }

        $productoTipo->delete();

        Flash::success('Producto Tipo deleted successfully.');

        return redirect(route('productoTipos.index'));
    }
}

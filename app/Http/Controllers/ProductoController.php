<?php

namespace App\Http\Controllers;

use App\DataTables\ProductoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Productos')->only(['show']);
        $this->middleware('permission:Crear Productos')->only(['create','store']);
        $this->middleware('permission:Editar Productos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Productos')->only(['destroy']);
    }

    /**
     * Display a listing of the Producto.
     *
     * @param ProductoDataTable $productoDataTable
     * @return Response
     */
    public function index(ProductoDataTable $productoDataTable)
    {
        return $productoDataTable->render('productos.index');
    }

    /**
     * Show the form for creating a new Producto.
     *
     * @return Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created Producto in storage.
     *
     * @param CreateProductoRequest $request
     *
     * @return Response
     */
    public function store(CreateProductoRequest $request)
    {
        $input = $request->all();

        /** @var Producto $producto */
        $producto = Producto::create($input);

        Flash::success('Producto guardado exitosamente.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified Producto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Producto $producto */
        $producto = Producto::find($id);

        if (empty($producto)) {
            Flash::error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified Producto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Producto $producto */
        $producto = Producto::find($id);

        if (empty($producto)) {
            Flash::error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        return view('productos.edit')->with('producto', $producto);
    }

    /**
     * Update the specified Producto in storage.
     *
     * @param  int              $id
     * @param UpdateProductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductoRequest $request)
    {
        /** @var Producto $producto */
        $producto = Producto::find($id);

        if (empty($producto)) {
            Flash::error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        $producto->fill($request->all());
        $producto->save();

        Flash::success('Producto actualizado con éxito.');

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified Producto from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Producto $producto */
        $producto = Producto::find($id);

        if (empty($producto)) {
            Flash::error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        $producto->delete();

        Flash::success('Producto deleted successfully.');

        return redirect(route('productos.index'));
    }
}

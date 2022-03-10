<?php

namespace App\Http\Controllers;

use App\DataTables\ClienteProcutoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateClienteProcutoRequest;
use App\Http\Requests\UpdateClienteProcutoRequest;
use App\Models\ClienteProcuto;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ClienteProcutoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Cliente Procutos')->only(['show']);
        $this->middleware('permission:Crear Cliente Procutos')->only(['create','store']);
        $this->middleware('permission:Editar Cliente Procutos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Cliente Procutos')->only(['destroy']);
    }

    /**
     * Display a listing of the ClienteProcuto.
     *
     * @param ClienteProcutoDataTable $clienteProcutoDataTable
     * @return Response
     */
    public function index(ClienteProcutoDataTable $clienteProcutoDataTable)
    {
        return $clienteProcutoDataTable->render('cliente_procutos.index');
    }

    /**
     * Show the form for creating a new ClienteProcuto.
     *
     * @return Response
     */
    public function create()
    {
        return view('cliente_procutos.create');
    }

    /**
     * Store a newly created ClienteProcuto in storage.
     *
     * @param CreateClienteProcutoRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteProcutoRequest $request)
    {
        $input = $request->all();

        /** @var ClienteProcuto $clienteProcuto */
        $clienteProcuto = ClienteProcuto::create($input);

        Flash::success('Cliente Procuto guardado exitosamente.');

        return redirect(route('clienteProcutos.index'));
    }

    /**
     * Display the specified ClienteProcuto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ClienteProcuto $clienteProcuto */
        $clienteProcuto = ClienteProcuto::find($id);

        if (empty($clienteProcuto)) {
            Flash::error('Cliente Procuto no encontrado');

            return redirect(route('clienteProcutos.index'));
        }

        return view('cliente_procutos.show')->with('clienteProcuto', $clienteProcuto);
    }

    /**
     * Show the form for editing the specified ClienteProcuto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ClienteProcuto $clienteProcuto */
        $clienteProcuto = ClienteProcuto::find($id);

        if (empty($clienteProcuto)) {
            Flash::error('Cliente Procuto no encontrado');

            return redirect(route('clienteProcutos.index'));
        }

        return view('cliente_procutos.edit')->with('clienteProcuto', $clienteProcuto);
    }

    /**
     * Update the specified ClienteProcuto in storage.
     *
     * @param  int              $id
     * @param UpdateClienteProcutoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteProcutoRequest $request)
    {
        /** @var ClienteProcuto $clienteProcuto */
        $clienteProcuto = ClienteProcuto::find($id);

        if (empty($clienteProcuto)) {
            Flash::error('Cliente Procuto no encontrado');

            return redirect(route('clienteProcutos.index'));
        }

        $clienteProcuto->fill($request->all());
        $clienteProcuto->save();

        Flash::success('Cliente Procuto actualizado con éxito.');

        return redirect(route('clienteProcutos.index'));
    }

    /**
     * Remove the specified ClienteProcuto from storage.
     *
     * @param  int $id
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
            Flash::error('Cliente Procuto no encontrado');

            return redirect(route('clienteProcutos.index'));
        }

        $clienteProcuto->delete();

        Flash::success('Cliente Procuto deleted successfully.');

        return redirect(route('clienteProcutos.index'));
    }
}

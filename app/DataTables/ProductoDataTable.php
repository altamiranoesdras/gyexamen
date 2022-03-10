<?php

namespace App\DataTables;

use App\Models\Producto;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function(Producto $producto){

                $id = $producto->id;

                return view('productos.datatables_actions',compact('producto','id'))->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Producto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Producto $model)
    {
        return $model->newQuery()->select('productos.*')->with(['tipo']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('pruebadatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"row mb-2"
                                        <"col-sm-12 col-md-6" B>
                                        <"col-sm-12 col-md-6" f>
                                    >
                                    rt
                                    <"row"
                                        <"col-sm-6 order-2 order-sm-1" ip>
                                        <"col-sm-6 order-1 order-sm-2 text-right" l>

                                    >')
            ->orderBy(1)
            ->buttons(
                Button::make('print')->text('<i class="fa fa-print"></i> <span class="d-none d-sm-inline">Imprimir</span>'),
                Button::make('reset')->text('<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'),
                Button::make('export')->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('tipo')->data('tipo.nombre')->name('tipo.nombre'),
            Column::make('nombre'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->title('Acciones')
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Productos_' . date('YmdHis');
    }
}

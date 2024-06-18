<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($product) {
                return '<a href="' . route('product.edit', $product->id) . '" class="btn btn-sm btn-primary">Edit</a>
                    <button onclick="deleteProduct(' . $product->id . ')" class="btn btn-sm btn-danger">Delete</button>';
            })
            ->editColumn('image', function ($product) {
                if ($product->image) {
                    return '<img src="' . asset('images/' . $product->image) . '" width="50" height="50">';
                } else {
                    return 'No image available';
                }
            })
            ->addColumn('category', function ($product) {
                return $product->category->name; // Akses nama kategori
            })
            ->editColumn('created_at', function ($product) {
                return $product->created_at ? $product->created_at->format('d M Y H:i:s') : '';
            })
            ->editColumn('updated_ats', function ($product) {
                return $product->updated_at ? $product->updated_at->format('d M Y H:i:s') : '';
            })
            ->setRowId('id')
            ->rawColumns(['image', 'action', 'created_at', 'updated_at']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()->with('category');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('products-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('add'),
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('image'),
            Column::make('name'),
            Column::make('description'),
            Column::make('price'),
            Column::make('stock'),
            Column::make('category'),
            Column::make('created_at'),
            Column::make('action'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Products_' . date('YmdHis');
    }
}

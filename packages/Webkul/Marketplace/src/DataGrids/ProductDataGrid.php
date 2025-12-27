<?php

namespace Webkul\Marketplace\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class ProductDataGrid extends DataGrid
{
    /**
     * Index.
     *
     * @var string
     */
    protected $primaryColumn = 'product_id';

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('marketplace_products')
            ->leftJoin('products', 'marketplace_products.product_id', '=', 'products.id')
            ->leftJoin('product_flat', 'products.id', '=', 'product_flat.product_id')
            ->where('marketplace_products.marketplace_seller_id', request('id'))
            ->addSelect(
                'products.id as product_id',
                'products.sku',
                'product_flat.name',
                'product_flat.price',
                'marketplace_products.is_approved',
                'marketplace_products.created_at'
            );

        return $queryBuilder;
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'product_id',
            'label'      => 'ID',
            'type'       => 'integer',
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'sku',
            'label'      => 'SKU',
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => 'Name',
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'price',
            'label'      => 'Price',
            'type'       => 'price',
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'is_approved',
            'label'      => 'Status',
            'type'       => 'boolean',
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->is_approved) {
                    return '<span class="badge badge-md badge-success">Approved</span>';
                } else {
                    return '<span class="badge badge-md badge-danger">Pending</span>';
                }
            },
        ]);
    }
}

<?php

namespace Webkul\Marketplace\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class SellerDataGrid extends DataGrid
{
    /**
     * Index.
     *
     * @var string
     */
    protected $primaryColumn = 'id';

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('marketplace_sellers')
            ->leftJoin('customers', 'marketplace_sellers.customer_id', '=', 'customers.id')
            ->addSelect(
                'marketplace_sellers.id',
                'marketplace_sellers.shop_title',
                'marketplace_sellers.url',
                'marketplace_sellers.is_approved',
                'marketplace_sellers.created_at',
                DB::raw('CONCAT(customers.first_name, " ", customers.last_name) as customer_name'),
                'customers.email'
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
            'index'      => 'id',
            'label'      => 'ID',
            'type'       => 'integer',
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'shop_title',
            'label'      => 'Shop Title',
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'customer_name',
            'label'      => 'Customer Name',
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'url',
            'label'      => 'Shop URL',
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
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

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => 'Created At',
            'type'       => 'datetime',
            'sortable'   => true,
            'filterable' => true,
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
         $this->addAction([
            'icon'   => 'icon-sort-right', // Using a generic icon for now
            'title'  => 'Approve',
            'method' => 'POST',
             'url'    => function ($row) {
                return route('admin.marketplace.sellers.update', ['id' => $row->id, 'status' => 1]);
            },
        ]);

        $this->addAction([
            'icon'   => 'icon-cross',
            'title'  => 'Disapprove',
            'method' => 'POST',
             'url'    => function ($row) {
                return route('admin.marketplace.sellers.update', ['id' => $row->id, 'status' => 0]);
            },
        ]);

        $this->addAction([
            'icon'   => 'icon-eye',
            'title'  => 'View Products',
            'method' => 'GET',
            'url'    => function ($row) {
                return route('admin.marketplace.sellers.products', ['id' => $row->id]);
            },
        ]);
    }
}

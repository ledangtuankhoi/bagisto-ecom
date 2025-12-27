@extends('admin::layouts.content')

@section('page_title')
    {{ $seller->shop_title }}'s Products
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ $seller->shop_title }}'s Products</h1>
            </div>
        </div>

        <div class="page-content">
            @datagrid_render(app(\Webkul\Marketplace\DataGrids\ProductDataGrid::class))
        </div>
    </div>
@stop

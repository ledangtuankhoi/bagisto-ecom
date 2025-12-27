@extends('shop::layouts.master')

@section('page_title')
    Edit Product
@stop

@section('content-wrapper')
    <div class="container mt-20 max-1180:px-5 max-md:mt-12">
        <div class="flex gap-10 items-start">
            <!-- Sidebar -->
            <div class="w-[280px] flex-shrink-0 p-5 border border-zinc-200 rounded-lg max-md:hidden">
                <nav class="flex flex-col gap-2">
                    <a href="{{ route('marketplace.account.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                        <span class="icon-dashboard text-xl"></span>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a href="{{ route('marketplace.account.products.index') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-navyBlue text-white rounded-lg">
                        <span class="icon-products text-xl"></span>
                        <span class="font-medium">Products</span>
                    </a>
                    <a href="{{ route('marketplace.account.orders.index') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                        <span class="icon-orders text-xl"></span>
                        <span class="font-medium">Orders</span>
                    </a>
                </nav>
            </div>

            <!-- Content -->
            <div class="flex-1 p-5 border border-zinc-200 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="font-dmserif text-3xl">Edit Product</h1>
                </div>

                <form method="POST" action="{{ route('marketplace.account.products.update', $product->id) }}">
                    @csrf
                    @method('PUT')

                    <p>Edit form will be here.</p>
                    <p>Product: {{ $product->product->name }}</p>

                    <button type="submit" class="btn btn-primary">
                        Update Product
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop

<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <x-slot:title>
        {{ $seller->shop_title }}
    </x-slot>

    <div class="container mt-20 max-1180:px-5 max-md:mt-12">
        <div class="flex gap-10 items-start">
            <!-- Seller Info -->
            <div class="w-[280px] flex-shrink-0 p-5 border border-zinc-200 rounded-lg max-md:hidden">
                <img src="{{ $seller->logo_url ?: bagisto_asset('images/product-placeholders/front.svg') }}"
                    class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h1 class="text-2xl font-bold">{{ $seller->shop_title }}</h1>
                    <p class="text-gray-600 mt-2">{{ $seller->description }}</p>
                </div>
            </div>

            <!-- Products -->
            <div class="flex-1 p-5 border border-zinc-200 rounded-lg">
                <h2 class="text-2xl font-bold mb-6">Products from {{ $seller->shop_title }}</h2>

                @php
                    $products = app('Webkul\Marketplace\Repositories\ProductRepository')->getSellerProducts($seller);
                @endphp

                @if ($products->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                        @foreach ($products as $product)
                            <x-shop::products.card :product="$product" />
                        @endforeach
                    </div>
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="p-8 text-center bg-gray-50 rounded-lg border border-gray-200">
                        <p class="text-gray-500">No products found for this seller.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-shop::layouts>

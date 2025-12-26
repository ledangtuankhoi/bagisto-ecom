<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <!-- Page Title -->
    <x-slot:title>
        {{ $seller->shop_title }}
    </x-slot>

    <!-- Banner -->
    <div class="relative w-full h-[300px] bg-gray-200 overflow-hidden">
        @if ($seller->banner)
            <img src="{{ storage_path($seller->banner) }}" class="w-full h-full object-cover">
        @else
            <div class="flex items-center justify-center w-full h-full text-zinc-400">
                <span class="icon-camera text-5xl"></span>
            </div>
        @endif

        <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-black/60 to-transparent">
            <div class="container max-1180:px-5 flex items-end gap-6">
                @if ($seller->logo)
                    <img src="{{ storage_path($seller->logo) }}" class="w-24 h-24 rounded-full border-4 border-white">
                @else
                    <div
                        class="w-24 h-24 rounded-full border-4 border-white bg-gray-100 flex items-center justify-center text-3xl font-bold text-gray-500">
                        {{ substr($seller->shop_title, 0, 1) }}
                    </div>
                @endif
                <div class="text-white pb-2">
                    <h1 class="text-3xl font-bold font-dmserif">{{ $seller->shop_title }}</h1>
                    <p class="text-white/80">{{ $seller->description ?? 'Welcome to my shop.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->
    <div class="container mt-12 mb-20 max-1180:px-5">
        <h2 class="text-2xl font-dmserif mb-8 border-b border-zinc-200 pb-2">Products</h2>

        @if ($products->count())
            <div class="grid grid-cols-4 gap-8 max-lg:grid-cols-3 max-md:grid-cols-2 max-sm:grid-cols-1">
                @foreach ($products as $link)
                    @php
                        $product = $link->product;
                        $images = $product->images;
                        $mainImage = $images->count()
                            ? $images->first()->url
                            : bagisto_asset('images/product-placeholders/front.svg');
                    @endphp

                    <div
                        class="group relative bg-white border border-transparent hover:border-zinc-200 hover:shadow-lg rounded-xl transition-all p-4">
                        <div class="relative overflow-hidden aspect-square rounded-lg bg-gray-100 mb-4">
                            <img src="{{ $mainImage }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>

                        <p class="text-xs text-gray-500 mb-1">{{ $product->attribute_family->name ?? 'Product' }}</p>
                        <h3 class="font-medium text-gray-900 mb-2 truncate">{{ $product->name }}</h3>
                        <p class="font-bold text-lg text-navyBlue">{{ core()->currency($product->price) }}</p>

                        <div class="mt-4">
                            <a href="{{ route('shop.product_or_category.index', $product->url_key) }}"
                                class="block w-full text-center py-2 bg-gray-900 text-white rounded hover:bg-gray-800 transition">View
                                Product</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @else
            <div class="py-20 text-center bg-gray-50 rounded-xl border border-gray-100">
                <span class="icon-products text-4xl text-gray-400 mb-4 block"></span>
                <p class="text-gray-500 text-lg">No products available in this shop yet.</p>
            </div>
        @endif
    </div>

</x-shop::layouts>

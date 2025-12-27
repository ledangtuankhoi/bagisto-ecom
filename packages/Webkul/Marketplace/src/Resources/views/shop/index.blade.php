<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <x-slot:title>
        Marketplace
    </x-slot>

    <div class="container mt-20 max-1180:px-5 max-md:mt-12">
        <h1 class="font-dmserif text-3xl mb-6">Marketplace</h1>

        @if ($sellers->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($sellers as $seller)
                    <div class="border border-zinc-200 rounded-lg p-5">
                        <a href="{{ route('marketplace.shop.view', $seller->url) }}">
                            <img src="{{ $seller->logo_url ?: bagisto_asset('images/product-placeholders/front.svg') }}"
                                class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h2 class="text-xl font-semibold">{{ $seller->shop_title }}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $sellers->links() }}
            </div>
        @else
            <div class="p-8 text-center bg-gray-50 rounded-lg border border-gray-200">
                <p class="text-gray-500">No sellers found.</p>
            </div>
        @endif
    </div>
</x-shop::layouts>
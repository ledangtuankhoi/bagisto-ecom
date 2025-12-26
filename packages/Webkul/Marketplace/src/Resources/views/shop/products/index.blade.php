<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <x-slot:title>
        My Products
    </x-slot>

    <div class="container mt-20 max-1180:px-5 max-md:mt-12">
        <div class="flex gap-10 items-start">
            <!-- Sidebar (Reused manually for now, should be a component) -->
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
                </nav>
            </div>

            <!-- Content -->
            <div class="flex-1 p-5 border border-zinc-200 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="font-dmserif text-3xl">My Products</h1>
                    <a href="{{ route('marketplace.account.products.search') }}"
                        class="primary-button px-6 py-2 rounded-lg">Add Product</a>
                </div>

                @if ($products->count())
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="py-3 px-4">Image</th>
                                    <th class="py-3 px-4">Name</th>
                                    <th class="py-3 px-4">Price</th>
                                    <th class="py-3 px-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $link)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-3 px-4">
                                            @php $images = $link->product->images; @endphp
                                            <img src="{{ $images->count() ? $images->first()->url : bagisto_asset('images/product-placeholders/front.svg') }}"
                                                class="w-12 h-12 object-cover rounded">
                                        </td>
                                        <td class="py-3 px-4 font-medium">{{ $link->product->name }}</td>
                                        <td class="py-3 px-4">{{ core()->currency($link->product->price) }}</td>
                                        <td class="py-3 px-4">
                                            @if ($link->is_approved)
                                                <span class="text-green-600 font-bold text-xs uppercase">Live</span>
                                            @else
                                                <span class="text-yellow-600 font-bold text-xs uppercase">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="p-8 text-center bg-gray-50 rounded-lg border border-gray-100">
                        <p class="text-gray-500 mb-4">You haven't added any products yet.</p>
                        <a href="{{ route('marketplace.account.products.search') }}"
                            class="text-blue-600 hover:underline">Add your first product</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-shop::layouts>

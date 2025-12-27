<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <x-slot:title>
        Order #{{ $order->id }}
    </x-slot>

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
                        class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                        <span class="icon-products text-xl"></span>
                        <span class="font-medium">Products</span>
                    </a>
                    <a href="{{ route('marketplace.account.orders.index') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-navyBlue text-white rounded-lg">
                        <span class="icon-orders text-xl"></span>
                        <span class="font-medium">Orders</span>
                    </a>
                </nav>
            </div>

            <!-- Content -->
            <div class="flex-1 p-5 border border-zinc-200 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="font-dmserif text-3xl">Order #{{ $order->id }}</h1>
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Order Information</h2>
                        <div class="flex flex-col gap-2">
                            <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                            <p><strong>Status:</strong> {{ $order->status_label }}</p>
                            <p><strong>Customer:</strong> {{ $order->customer_full_name }}</p>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Shipping Address</h2>
                        <div class="flex flex-col gap-2">
                            <p>{{ $order->shipping_address->address1 }}</p>
                            <p>{{ $order->shipping_address->city }}, {{ $order->shipping_address->state }} {{ $order->shipping_address->postcode }}</p>
                            <p>{{ $order->shipping_address->country }}</p>
                        </div>
                    </div>
                </div>

                <h2 class="text-xl font-semibold mt-8 mb-4">Order Items</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="py-3 px-4">Product</th>
                                <th class="py-3 px-4">Price</th>
                                <th class="py-3 px-4">Quantity</th>
                                <th class="py-3 px-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $item->name }}</td>
                                    <td class="py-3 px-4">{{ core()->currency($item->price) }}</td>
                                    <td class="py-3 px-4">{{ $item->qty_ordered }}</td>
                                    <td class="py-3 px-4">{{ core()->currency($item->total) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-shop::layouts>

<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <x-slot:title>
        My Orders
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
                    <h1 class="font-dmserif text-3xl">My Orders</h1>
                </div>

                @if ($orders->count())
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="py-3 px-4">ID</th>
                                    <th class="py-3 px-4">Date</th>
                                    <th class="py-3 px-4">Total</th>
                                    <th class="py-3 px-4">Status</th>
                                    <th class="py-3 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-3 px-4">#{{ $order->id }}</td>
                                        <td class="py-3 px-4">{{ $order->created_at->format('d M Y') }}</td>
                                        <td class="py-3 px-4">{{ core()->currency($order->grand_total) }}</td>
                                        <td class="py-3 px-4">{{ $order->status_label }}</td>
                                        <td class="py-3 px-4">
                                            <a href="{{ route('marketplace.account.orders.view', $order->id) }}" class="text-blue-600 hover:underline">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                @else
                    <div class="p-8 text-center bg-gray-50 rounded-lg border border-gray-200">
                        <p class="text-gray-500">You have no orders yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-shop::layouts>

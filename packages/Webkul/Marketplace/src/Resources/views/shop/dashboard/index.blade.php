<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <!-- Page Title -->
    <x-slot:title>
        Seller Dashboard
    </x-slot>

    <div class="container mt-20 max-1180:px-5 max-md:mt-12">
        <div class="flex gap-10 items-start">
            <!-- Sidebar -->
            <div class="w-[280px] flex-shrink-0 p-5 border border-zinc-200 rounded-lg max-md:hidden">
                <div class="flex gap-4 items-center mb-8">
                    @if ($seller->logo)
                        <img src="{{ storage_path($seller->logo) }}"
                            class="w-12 h-12 rounded-full border border-gray-200">
                    @else
                        <div
                            class="w-12 h-12 rounded-full border border-gray-200 bg-gray-100 flex items-center justify-center text-xl font-bold text-gray-500">
                            {{ substr($seller->shop_title, 0, 1) }}
                        </div>
                    @endif
                    <div>
                        <p class="font-bold text-gray-800">{{ $seller->shop_title }}</p>
                        <a href="{{ route('marketplace.shop.view', $seller->url) }}" target="_blank"
                            class="text-xs text-blue-600 hover:underline">View Shop</a>
                    </div>
                </div>

                <nav class="flex flex-col gap-2">
                    <a href="{{ route('marketplace.account.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-navyBlue text-white rounded-lg">
                        <span class="icon-dashboard text-xl"></span>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                        <span class="icon-products text-xl"></span>
                        <span class="font-medium">Products</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                        <span class="icon-orders text-xl"></span>
                        <span class="font-medium">Orders</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                        <span class="icon-settings text-xl"></span>
                        <span class="font-medium">Settings</span>
                    </a>
                </nav>
            </div>

            <!-- Content -->
            <div class="flex-1 p-5 border border-zinc-200 rounded-lg">
                <h1 class="font-dmserif text-3xl mb-6">Dashboard</h1>

                <div class="grid grid-cols-3 gap-6 mb-8">
                    <!-- Stat Card -->
                    <div class="p-6 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-gray-500 mb-2">Total Sales</p>
                        <p class="text-3xl font-bold text-navyBlue">$0.00</p>
                    </div>
                    <div class="p-6 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-gray-500 mb-2">Total Orders</p>
                        <p class="text-3xl font-bold text-navyBlue">0</p>
                    </div>
                    <div class="p-6 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-gray-500 mb-2">Total Products</p>
                        <p class="text-3xl font-bold text-navyBlue">0</p>
                    </div>
                </div>

                <div class="p-6 bg-yellow-50 border border-yellow-200 rounded-lg text-yellow-800">
                    <p class="font-bold">Welcome to your Seller Dashboard!</p>
                    <p class="mt-2 text-sm">You can manage your products, orders and profile from here. Some features
                        might be limited pending admin approval or further development.</p>
                </div>
            </div>
        </div>
    </div>
</x-shop::layouts>

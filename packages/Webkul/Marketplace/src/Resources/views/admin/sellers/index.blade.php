<x-admin::layouts>
    <x-slot:title>
        Marketplace Sellers
    </x-slot>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            Marketplace Sellers
        </p>
    </div>

    <!-- DataGrid -->
    <div class="mt-7">
        <x-admin::datagrid :src="route('admin.marketplace.sellers.index')" />
    </div>
</x-admin::layouts>

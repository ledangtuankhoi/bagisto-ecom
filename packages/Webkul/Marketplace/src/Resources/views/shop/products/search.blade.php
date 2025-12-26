<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <x-slot:title>
        Add Product
    </x-slot>

    <div class="container mt-20 max-1180:px-5 max-md:mt-12">
        <div class="m-auto w-full max-w-[600px] border border-zinc-200 rounded-xl p-8">
            <h1 class="font-dmserif text-3xl mb-4">Add Product to Shop</h1>
            <p class="text-gray-500 mb-8">Enter the Product ID you want to sell. (Simplified for Phase 2)</p>

            <x-shop::form :action="route('marketplace.account.products.store')">
                <x-shop::form.control-group class="mb-6">
                    <x-shop::form.control-group.label class="required">
                        Product ID
                    </x-shop::form.control-group.label>

                    <x-shop::form.control-group.control type="text" name="product_id" rules="required|numeric"
                        label="Product ID" placeholder="e.g. 1" />
                    <x-shop::form.control-group.error control-name="product_id" />
                </x-shop::form.control-group>

                <button class="primary-button w-full py-3 rounded-lg">
                    Add to Shop
                </button>
            </x-shop::form>
        </div>
    </div>
</x-shop::layouts>

<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <!-- Page Title -->
    <x-slot:title>
        Become a Seller
    </x-slot>

    <div class="container mt-20 max-1180:px-5 max-md:mt-12">

        <!-- Form Container -->
        <div
            class="m-auto w-full max-w-[870px] rounded-xl border border-zinc-200 p-16 px-[90px] max-md:px-8 max-md:py-8 max-sm:border-none max-sm:p-0">
            <h1 class="font-dmserif text-4xl max-md:text-3xl max-sm:text-xl">
                Become a Seller
            </h1>

            <p class="mt-4 text-xl text-zinc-500 max-sm:mt-0 max-sm:text-sm">
                Register your shop and start selling today.
            </p>

            <div class="mt-14 rounded max-sm:mt-8">
                <x-shop::form :action="route('marketplace.seller.store')">

                    <!-- Shop Title -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            Shop Title
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control type="text" class="px-6 py-4 max-md:py-3 max-sm:py-2"
                            name="shop_title" rules="required" :value="old('shop_title')" label="Shop Title"
                            placeholder="My Awesome Shop" />

                        <x-shop::form.control-group.error control-name="shop_title" />
                    </x-shop::form.control-group>

                    <!-- Shop URL -->
                    <x-shop::form.control-group class="mb-6">
                        <x-shop::form.control-group.label class="required">
                            Shop URL (Slug)
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control type="text" class="px-6 py-4 max-md:py-3 max-sm:py-2"
                            name="url" rules="required|alpha_dash" :value="old('url')" label="Shop URL"
                            placeholder="my-awesome-shop" />
                        <p class="text-xs text-zinc-500 mt-1">Unique identifier for your shop URL.</p>

                        <x-shop::form.control-group.error control-name="url" />
                    </x-shop::form.control-group>

                    <div class="mt-8 flex flex-wrap items-center gap-9 max-sm:justify-center max-sm:gap-5">
                        <button
                            class="primary-button m-0 mx-auto block w-full max-w-[374px] rounded-2xl px-11 py-4 text-center text-base max-md:max-w-full max-md:rounded-lg max-md:py-3 max-sm:py-1.5 ltr:ml-0 rtl:mr-0"
                            type="submit">
                            Register Shop
                        </button>
                    </div>

                </x-shop::form>
            </div>
        </div>
    </div>
</x-shop::layouts>

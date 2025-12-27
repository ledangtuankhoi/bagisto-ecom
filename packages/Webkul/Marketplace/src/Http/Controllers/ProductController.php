<?php

namespace Webkul\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use Webkul\Marketplace\Models\Seller;
use Webkul\Marketplace\Models\MarketplaceProduct;
use Webkul\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     * @return void
     */
    public function __construct(protected ProductRepository $productRepository) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customer = auth()->guard('customer')->user();
        $seller = Seller::where('customer_id', $customer->id)->first();

        $products = MarketplaceProduct::with('product')
            ->where('marketplace_seller_id', $seller->id)
            ->paginate(10);

        return view('marketplace::shop.products.index', compact('products'));
    }

    /**
     * Show the search form for products to link.
     */
    public function search()
    {
        return view('marketplace::shop.products.search');
    }

    /**
     * Store a newly created linkage.
     */
    public function store()
    {
        $customer = auth()->guard('customer')->user();
        $seller = Seller::where('customer_id', $customer->id)->first();
        
        $productId = request('product_id');

        // Check availability
        if (MarketplaceProduct::where('product_id', $productId)->exists()) {
             return redirect()->back()->with('error', 'This product is already being sold by a vendor.');
        }

        MarketplaceProduct::create([
            'marketplace_seller_id' => $seller->id,
            'product_id' => $productId,
            'is_approved' => 0, // Pending admin approval
        ]);

        return redirect()->route('marketplace.account.products.index')->with('success', 'Product added to your shop pending approval.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = MarketplaceProduct::with('product')->findOrFail($id);

        return view('marketplace::shop.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // For now, we will just re-approve the product.
        // In a real application, you would validate the input and update the product details.
        $product = MarketplaceProduct::findOrFail($id);
        $product->update(['is_approved' => 1]);

        return redirect()->route('marketplace.account.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MarketplaceProduct::destroy($id);

        return redirect()->route('marketplace.account.products.index')->with('success', 'Product removed from your shop.');
    }
}

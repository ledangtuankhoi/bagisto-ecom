<?php

namespace Webkul\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use Webkul\Marketplace\Models\Seller;
use Webkul\Marketplace\Models\MarketplaceProduct;

class ShopController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $url
     * @return \Illuminate\View\View
     */
    public function view($url)
    {
        $seller = Seller::where('url', $url)->firstOrFail();

        if (! $seller->is_approved) {
            abort(404);
        }

        $products = MarketplaceProduct::with('product')
            ->where('marketplace_seller_id', $seller->id)
            ->where('is_approved', 1) // Only show approved products
            ->paginate(12);

        return view('marketplace::shop.index', compact('seller', 'products'));
    }
}

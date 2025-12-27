<?php

namespace Webkul\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use Webkul\Marketplace\Models\Seller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sellers = Seller::where('is_approved', 1)->paginate(10);

        return view('marketplace::shop.index', compact('sellers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $url
     * @return \Illuminate\View\View
     */
    public function view($url)
    {
        $seller = Seller::where('url', $url)->firstOrFail();

        return view('marketplace::shop.view', compact('seller'));
    }
}
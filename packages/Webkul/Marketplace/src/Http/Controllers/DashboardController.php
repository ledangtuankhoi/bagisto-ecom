<?php

namespace Webkul\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use Webkul\Marketplace\Models\Seller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customer = auth()->guard('customer')->user();
        $seller = Seller::where('customer_id', $customer->id)->first();

        return view('marketplace::shop.dashboard.index', compact('seller'));
    }
}

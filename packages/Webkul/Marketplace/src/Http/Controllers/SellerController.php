<?php

namespace Webkul\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use Webkul\Marketplace\Models\Seller;

class SellerController extends Controller
{
    /**
     * Show the seller registration form.
     */
    public function create()
    {
        $customer = auth()->guard('customer')->user();

        if ($customer && Seller::where('customer_id', $customer->id)->exists()) {
            return redirect()->route('shop.customers.account.index');
        }

        return view('marketplace::shop.sellers.create');
    }

    /**
     * Store a newly created seller.
     */
    public function store()
    {
        $customer = auth()->guard('customer')->user();

        if (Seller::where('customer_id', $customer->id)->exists()) {
            return redirect()->back()->with('error', 'You are already registered as a seller.');
        }

        request()->validate([
            'url'        => 'required|unique:marketplace_sellers,url|alpha_dash',
            'shop_title' => 'required',
        ]);

        Seller::create([
            'customer_id'   => $customer->id,
            'url'           => request('url'),
            'shop_title'    => request('shop_title'),
            'is_approved'   => 0, // Pending approval
        ]);

        session()->flash('success', 'Your seller request has been sent successfully. Please wait for admin approval.');

        return redirect()->route('shop.customers.account.index');
    }
}

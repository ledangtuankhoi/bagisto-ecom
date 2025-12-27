<?php

namespace Webkul\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use Webkul\Marketplace\Models\Seller;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderItem;

class OrderController extends Controller
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

        $orders = Order::whereHas('items', function ($query) use ($seller) {
            $query->where('vendor_id', $seller->id);
        })->paginate(10);

        return view('marketplace::shop.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $order = Order::findOrFail($id);

        return view('marketplace::shop.orders.view', compact('order'));
    }
}

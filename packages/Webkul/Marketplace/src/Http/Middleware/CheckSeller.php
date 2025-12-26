<?php

namespace Webkul\Marketplace\Http\Middleware;

use Closure;
use Webkul\Marketplace\Models\Seller;

class CheckSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $customer = auth()->guard('customer')->user();

        if (! $customer) {
            return redirect()->route('shop.customer.session.index');
        }

        $seller = Seller::where('customer_id', $customer->id)->first();

        if (! $seller || ! $seller->is_approved) {
            return redirect()->route('shop.customers.account.index')->with('warning', 'You must be an approved seller to access this page.');
        }

        return $next($request);
    }
}

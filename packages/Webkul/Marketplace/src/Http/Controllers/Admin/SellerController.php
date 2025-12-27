<?php

namespace Webkul\Marketplace\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Webkul\Marketplace\DataGrids\ProductDataGrid;
use Webkul\Marketplace\Models\Seller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(SellerDataGrid::class)->toJson();
        }

        return view('marketplace::admin.sellers.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $status = request()->input('status');

        $seller = Seller::findOrFail($id);
        $seller->update(['is_approved' => $status]);

        if ($status) {
            session()->flash('success', 'Seller approved successfully.');
        } else {
            session()->flash('success', 'Seller disapproved successfully.');
        }

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function products($id)
    {
        if (request()->ajax()) {
            return app(ProductDataGrid::class)->toJson();
        }
        
        $seller = Seller::findOrFail($id);

        return view('marketplace::admin.sellers.products.index', compact('seller'));
    }
}

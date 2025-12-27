<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Marketplace\Contracts\MarketplaceProduct as MarketplaceProductContract;

class MarketplaceProductProxy extends Model implements MarketplaceProductContract
{
    /**
     * Get the marketplace product that owns the product.
     */
    public function product()
    {
        return $this->belongsTo(\Webkul\Product\Models\ProductProxy::modelClass());
    }

    /**
     * Get the seller that owns the product.
     */
    public function seller()
    {
        return $this->belongsTo(SellerProxy::modelClass(), 'marketplace_seller_id');
    }
}

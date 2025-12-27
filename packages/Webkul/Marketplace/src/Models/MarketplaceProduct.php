<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\Product;

class MarketplaceProduct extends Model
{
    protected $table = 'marketplace_products';

    protected $fillable = [
        'marketplace_seller_id',
        'product_id',
        'is_approved',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'marketplace_seller_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

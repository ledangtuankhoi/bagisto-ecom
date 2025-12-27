<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Customer\Models\Customer;

class Seller extends Model
{
    protected $table = 'marketplace_sellers';

    protected $fillable = [
        'customer_id',
        'url',
        'shop_title',
        'logo',
        'banner',
        'description',
        'is_approved',
        'commission_percentage',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

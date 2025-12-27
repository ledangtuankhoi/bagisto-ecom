<?php

namespace Webkul\Marketplace\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Marketplace\Models\MarketplaceProduct;

class ProductRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\Product\Contracts\Product';
    }

    /**
     * @param \Webkul\Marketplace\Models\Seller $seller
     * @return \Illuminate\Support\Collection
     */
    public function getSellerProducts($seller)
    {
        return $this->model->whereHas('marketplace_product', function ($query) use ($seller) {
            $query->where('marketplace_seller_id', $seller->id);
        })->paginate(10);
    }
}
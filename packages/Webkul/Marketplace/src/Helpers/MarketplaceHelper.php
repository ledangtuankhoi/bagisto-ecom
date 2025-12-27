<?php

namespace Webkul\Marketplace\Helpers;

use Webkul\Marketplace\Models\MarketplaceProduct;
use Webkul\Marketplace\Models\Seller;

class MarketplaceHelper
{
    /**
     * Get seller by product.
     *
     * @param  \Webkul\Product\Models\Product  $product
     * @return \Webkul\Marketplace\Models\Seller|null
     */
    public function getSellerByProduct($product)
    {
        $marketplaceProduct = MarketplaceProduct::where('product_id', $product->id)->first();

        if ($marketplaceProduct) {
            return $marketplaceProduct->seller;
        }

        return null;
    }
}

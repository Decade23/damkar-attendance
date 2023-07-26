<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     productTrait.php
 * @LastModified 4/11/19 11:02 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\Products;

use App\Models\Product;

trait ProductTrait
{
    public function getProductBySlug($slug)
    {
        return Product::where('slug', $slug)->firstOrFail();
    }
}

<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Product;
use App\Http\Resources\Market\ProductResource;

class ProductService
{
    public function getOne(Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}

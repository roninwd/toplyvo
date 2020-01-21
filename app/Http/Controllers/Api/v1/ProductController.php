<?php

namespace App\Http\Controllers\Api\v1;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Market\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function show(Product $product): ProductResource
    {
        return $this->service->getOne($product);
    }
}

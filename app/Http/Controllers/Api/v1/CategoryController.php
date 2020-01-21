<?php

namespace App\Http\Controllers\Api\v1;

use App\Entities\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Market\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): AnonymousResourceCollection
    {
        return $this->service->getAll();
    }

    public function show(Category $category): CategoryResource
    {
        return $this->service->getOne($category);
    }
}

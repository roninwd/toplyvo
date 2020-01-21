<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Category;
use App\Http\Resources\Market\AllCategoriesResource;
use App\Http\Resources\Market\CategoryResource;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryService
{
    private CategoryRepository $repo;

    public function __construct(CategoryRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll(): AnonymousResourceCollection
    {
        return AllCategoriesResource::collection($this->repo->getAll());
    }

    public function getOne(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }
}

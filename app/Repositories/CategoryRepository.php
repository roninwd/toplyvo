<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CategoryRepository
{
    public function getAll(): LengthAwarePaginator
    {
        return Category::paginate();
    }
}

<?php

namespace App\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Entities\Product
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $slug
 * @property int $category_id
 * @property-read Category $category
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereSlug($value)
 * @mixin Eloquent
 * @property-read Collection|ProductParameters[] $parameters
 * @property-read int|null $parameters_count
 */
class Product extends Model
{
    public $timestamps = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function parameters(): HasMany
    {
        return $this->hasMany(ProductParameters::class, 'product_id', 'id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

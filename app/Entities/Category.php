<?php

namespace App\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Entities\Category
 *
 * @property int $id
 * @property string $name
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @mixin Eloquent
 * @property string $slug
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @method static Builder|Category whereSlug($value)
 */
class Category extends Model
{
    protected $perPage = 10;
    public $timestamps = false;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

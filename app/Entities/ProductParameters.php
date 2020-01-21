<?php

namespace App\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Entities\ProductParameters
 *
 * @method static Builder|ProductParameters newModelQuery()
 * @method static Builder|ProductParameters newQuery()
 * @method static Builder|ProductParameters query()
 * @mixin Eloquent
 * @property int $product_id
 * @property int $characteristic_id
 * @property string $value
 * @method static Builder|ProductParameters whereCharacteristicId($value)
 * @method static Builder|ProductParameters whereProductId($value)
 * @method static Builder|ProductParameters whereValue($value)
 * @property-read Characteristic $characteristic
 * @property-read Product $product
 */
class ProductParameters extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function characteristic(): BelongsTo
    {
        return $this->belongsTo(Characteristic::class);
    }
}

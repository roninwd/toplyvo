<?php

namespace App\Entities\Order;

use App\Services\Payment\ICanSum;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Entities\OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $count
 * @property int $price
 * @property-read Order $order
 * @method static Builder|OrderItem newModelQuery()
 * @method static Builder|OrderItem newQuery()
 * @method static Builder|OrderItem query()
 * @method static Builder|OrderItem whereCount($value)
 * @method static Builder|OrderItem whereId($value)
 * @method static Builder|OrderItem whereOrderId($value)
 * @method static Builder|OrderItem wherePrice($value)
 * @method static Builder|OrderItem whereProductId($value)
 * @mixin Eloquent
 */
class OrderItem extends Model implements ICanSum
{
    public $timestamps = false;

    protected $fillable = ['product_id', 'count', 'price'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getAmount(): int
    {
        return $this->price * $this->count;
    }
}

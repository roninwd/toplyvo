<?php

namespace App\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Webmozart\Assert\Assert;

/**
 * App\Entities\Order
 *
 * @property int $id
 * @property string $status
 * @property int|null $user_id
 * @property string $email
 * @property string $name
 * @property string|null $surname
 * @property string|null $country
 * @property string|null $city
 * @property string|null $street
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|OrderItem[] $items
 * @property-read int|null $items_count
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCity($value)
 * @method static Builder|Order whereCountry($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereEmail($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereName($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereStreet($value)
 * @method static Builder|Order whereSurname($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 * @mixin Eloquent
 */
class Order extends Model
{
    protected $fillable = ['name', 'email', 'surname', 'country', 'city', 'street'];

    public const STATUS_WAIT_PAYMENT = 'wait_payment';
    public const STATUS_PAID = 'paid';
    public const STATUS_DELIVERED = 'delivered';

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function changeStatus(string $status): void
    {
        Assert::oneOf($status, self::getStatuses());
        $this->status = $status;
        $this->save();
    }

    public static function getStatuses(): array
    {
        return [
            self::STATUS_PAID,
            self::STATUS_WAIT_PAYMENT,
            self::STATUS_DELIVERED
        ];
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT_PAYMENT;
    }

    public function isPaid(): bool
    {
        return $this->status === self::STATUS_PAID;
    }
}

<?php

namespace App\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Characteristic
 *
 * @method static Builder|Characteristic newModelQuery()
 * @method static Builder|Characteristic newQuery()
 * @method static Builder|Characteristic query()
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @method static Builder|Characteristic whereId($value)
 * @method static Builder|Characteristic whereName($value)
 */
class Characteristic extends Model
{
    public $timestamps = false;
}

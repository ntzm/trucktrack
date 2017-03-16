<?php

namespace App\Models;

use App\Support\Distance;
use App\Support\Money;
use App\Support\Percentage;
use App\Support\Volume;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int cargo_id
 * @property int from_id
 * @property int to_id
 * @property int user_id
 * @property int $distance
 * @property int $earnings
 * @property float $fuel_used
 * @property float $trailer_damage
 *
 * @property Cargo $cargo
 * @property Location $from
 * @property Location $to
 * @property User $user
 */
class Delivery extends Model
{
    protected $fillable = [
        'distance',
        'earnings',
        'fuel_used',
        'trailer_damage',
    ];

    public function getDistanceAttribute($value): Distance
    {
        return new Distance($value);
    }

    public function getEarningsAttribute($value): Money
    {
        return new Money($value);
    }

    public function getFuelUsedAttribute($value): Volume
    {
        return new Volume($value);
    }

    public function getTrailerDamageAttribute(): Percentage
    {
        return new Percentage($this->attributes['trailer_damage']);
    }

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }

    public function from(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'from_id');
    }

    public function to(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'to_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use App\Support\Distance;
use App\Support\Money;
use App\Support\Percentage;
use App\Support\Volume;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

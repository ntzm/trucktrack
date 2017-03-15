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

    public function getDistanceAttribute(): Distance
    {
        return new Distance($this->attributes['distance']);
    }

    public function getEarningsAttribute(): Money
    {
        return new Money($this->attributes['earnings']);
    }

    public function getFuelUsedAttribute(): Volume
    {
        return new Volume($this->attributes['fuel_used']);
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

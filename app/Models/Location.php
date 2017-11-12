<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $country_id
 * @property int $map_id
 * @property string $name
 * @property Country $country
 * @property \Illuminate\Database\Eloquent\Collection $deliveries
 * @property Map $map
 */
final class Location extends Model
{
    public $timestamps = false;

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }

    public function map(): BelongsTo
    {
        return $this->belongsTo(Map::class);
    }
}

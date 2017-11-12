<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Database\Eloquent\Collection $locations
 */
final class Country extends Model
{
    public $timestamps = false;

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}

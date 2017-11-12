<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Database\Eloquent\Collection $maps
 */
final class Game extends Model
{
    public $timestamps = false;

    public function maps(): HasMany
    {
        return $this->hasMany(Map::class);
    }
}

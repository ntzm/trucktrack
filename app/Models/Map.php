<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $game_id
 * @property string $name
 * @property string $type
 * @property Game $game
 * @property \Illuminate\Database\Eloquent\Collection $locations
 */
final class Map extends Model
{
    public $timestamps = false;

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}

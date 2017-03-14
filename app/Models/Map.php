<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Map extends Model
{
    const TYPE_DEFAULT = 'default';
    const TYPE_DLC = 'dlc';
    const TYPE_MOD = 'mod';

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
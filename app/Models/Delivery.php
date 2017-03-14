<?php

namespace App\Models;

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

    protected $casts = [
        'earnings' => 'int',
        'fuel_used' => 'float',
        'trailer_damage' => 'float',
    ];

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

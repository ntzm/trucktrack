<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{
    public $timestamps = false;

    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }
}

<?php

namespace App\Policies;

use App\Models\Delivery;
use App\Models\User;

class DeliveryPolicy
{
    public function update(User $user, Delivery $delivery): bool
    {
        return $delivery->user->is($user);
    }
}

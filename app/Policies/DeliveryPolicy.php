<?php

namespace App\Policies;

use App\Models\Delivery;
use App\Models\User;

final class DeliveryPolicy
{
    public function modify(User $user, Delivery $delivery): bool
    {
        return $delivery->user->is($user);
    }
}

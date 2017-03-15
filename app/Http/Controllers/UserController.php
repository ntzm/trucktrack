<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
            'recentDeliveries' => $user->deliveries()->orderBy('created_at', 'desc')->limit(5)->get(),
            'deliveryCount' => $user->deliveries()->count(),
            'mostProfitableDelivery' => $user->deliveries()->orderBy('earnings', 'desc')->first(),
            'furthestDelivery' => $user->deliveries()->orderBy('distance', 'desc')->first(),
        ]);
    }

    public function showDeliveries(User $user)
    {
        $deliveries = $user->deliveries()
            ->with('cargo', 'from', 'to', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('users.deliveries', compact('user', 'deliveries'));
    }
}

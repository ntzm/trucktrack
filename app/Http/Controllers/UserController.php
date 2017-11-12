<?php

namespace App\Http\Controllers;

use App\Models\User;

final class UserController extends Controller
{
    public function overview(User $user)
    {
        return view('user.show', [
            'user' => $user,
            'recentDeliveries' => $user->deliveries()->orderBy('created_at', 'desc')->limit(5)->get(),
            'deliveryCount' => $user->deliveries()->count(),
            'mostProfitableDelivery' => $user->deliveries()->orderBy('earnings', 'desc')->first(),
            'furthestDelivery' => $user->deliveries()->orderBy('distance', 'desc')->first(),
        ]);
    }

    public function deliveries(User $user)
    {
        $deliveries = $user->deliveries()
            ->with('cargo', 'from', 'to', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('user.deliveries', compact('user', 'deliveries'));
    }
}

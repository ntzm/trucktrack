<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;

class UserController extends Controller
{
    public function show(User $user)
    {
        $recentDeliveries = $user->deliveries()->orderBy('created_at', 'desc')->limit(5)->get();

        $totals = [
            'all' => $user->deliveries()->count(),
            'month' => $user->deliveries()->where('created_at', '>=', new DateTime('-31 days'))->count(),
            'day' => $user->deliveries()->where('created_at', '>=', new DateTime('-24 hours'))->count(),
        ];

        return view('users.show', compact('user', 'recentDeliveries', 'totals'));
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

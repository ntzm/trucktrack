<?php

namespace App\Http\Controllers;

use App\Models\Delivery;

class DashboardController extends Controller
{
    public function index()
    {
        $recentDeliveries = Delivery::orderBy('created_at', 'desc')->limit(5)->get();

        return view('dashboard', compact('recentDeliveries'));
    }
}

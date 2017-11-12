<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use DateTime;

final class HomeController extends Controller
{
    public function index()
    {
        $recentDeliveries = Delivery::orderBy('created_at', 'desc')->limit(5)->get();

        $totals = [
            'all' => Delivery::count(),
            'month' => Delivery::where('created_at', '>=', new DateTime('-31 days'))->count(),
            'day' => Delivery::where('created_at', '>=', new DateTime('-24 hours'))->count(),
        ];

        return view('home', compact('recentDeliveries', 'totals'));
    }
}

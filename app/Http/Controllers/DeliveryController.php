<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDelivery;
use App\Models\Cargo;
use App\Models\Delivery;
use App\Models\Game;
use App\Models\Location;
use App\Models\Preference;
use Auth;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Auth::user()
            ->deliveries()
            ->with('cargo', 'from', 'to')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('deliveries.index', compact('deliveries'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        $games = Game::all();

        return view('deliveries.create', compact('cargos', 'games'));
    }

    public function store(StoreDelivery $request)
    {
        $delivery = new Delivery($request->all());

        $delivery->user()->associate(Auth::user());
        $delivery->cargo()->associate(Cargo::find($request->get('cargo')));
        $delivery->from()->associate(Location::find($request->get('from')));
        $delivery->to()->associate(Location::find($request->get('to')));

        $delivery->save();

        return redirect()->route('deliveries.show', compact('delivery'));
    }

    public function show(Delivery $delivery)
    {
        return view('deliveries.show', compact('delivery'));
    }
}

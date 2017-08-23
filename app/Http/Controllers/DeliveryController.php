<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDelivery;
use App\Models\Cargo;
use App\Models\Delivery;
use App\Models\Game;
use App\Models\Location;
use Auth;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::with('cargo', 'from', 'to', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('deliveries.index', compact('deliveries'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        $games = Game::all();

        $previousDelivery = Auth::user()
            ->deliveries()
            ->with('to.map.game')
            ->latest()
            ->first();

        return view(
            'deliveries.create',
            compact('cargos', 'games', 'previousDelivery')
        );
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

    public function edit(Delivery $delivery)
    {
        $cargos = Cargo::all();
        $games = Game::all();

        return view('deliveries.edit', compact('delivery', 'cargos', 'games'));
    }

    public function update(StoreDelivery $request, Delivery $delivery)
    {
        $delivery->fill($request->all());

        $delivery->cargo()->associate(Cargo::find($request->get('cargo')));
        $delivery->from()->associate(Location::find($request->get('from')));
        $delivery->to()->associate(Location::find($request->get('to')));

        $delivery->save();

        return redirect()->route('deliveries.show', compact('delivery'));
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();

        return redirect('/');
    }
}

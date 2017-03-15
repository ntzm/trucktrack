<?php

namespace App\Http\Controllers\Api;

use App\Directions\PolylineFetcher;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetDirections;
use App\Models\Location;

class DirectionsController extends Controller
{
    /**
     * @var PolylineFetcher
     */
    private $polylineFetcher;

    public function __construct(PolylineFetcher $polylineFetcher)
    {
        $this->polylineFetcher = $polylineFetcher;
    }

    public function get(GetDirections $request)
    {
        return $this->polylineFetcher->fetch(
            Location::find($request->get('from')),
            Location::find($request->get('to'))
        );
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Directions\PolylineFetcher;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetDirections;

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
            $request->get('from'),
            $request->get('to')
        );
    }
}

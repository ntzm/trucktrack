<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;

class GameController extends Controller
{
    public function getLocations(Game $game)
    {
        return $game->maps()->with('locations')->get();
    }
}

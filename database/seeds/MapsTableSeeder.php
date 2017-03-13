<?php

use App\Models\Game;
use App\Models\Map;
use Illuminate\Database\Seeder;

class MapsTableSeeder extends Seeder
{
    public function run()
    {
        $ets2 = Game::where('name', 'Euro Truck Simulator 2')->first()->id;
        $ats = Game::where('name', 'American Truck Simulator')->first()->id;

        DB::table('maps')->insert([
            [
                'name' => 'Default',
                'type' => Map::TYPE_DEFAULT,
                'game_id' => $ets2,
            ],
            [
                'name' => 'Going East!',
                'type' => Map::TYPE_DLC,
                'game_id' => $ets2,
            ],
            [
                'name' => 'Scandinavia',
                'type' => Map::TYPE_DLC,
                'game_id' => $ets2,
            ],
            [
                'name' => 'Viva la France !',
                'type' => Map::TYPE_DLC,
                'game_id' => $ets2,
            ],
            [
                'name' => 'Promods',
                'type' => Map::TYPE_MOD,
                'game_id' => $ets2,
            ],
            [
                'name' => 'Rusmap',
                'type' => Map::TYPE_MOD,
                'game_id' => $ets2,
            ],
            [
                'name' => 'Default',
                'type' => Map::TYPE_DEFAULT,
                'game_id' => $ats,
            ],
            [
                'name' => 'Arizona',
                'type' => Map::TYPE_DLC,
                'game_id' => $ats,
            ],
        ]);
    }
}

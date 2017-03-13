<?php

use App\Models\Map;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration
{
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('game_id');
            $table->string('name');
            $table->enum('type', [Map::TYPE_DEFAULT, Map::TYPE_DLC, Map::TYPE_MOD]);

            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    public function down()
    {
        Schema::dropIfExists('maps');
    }
}

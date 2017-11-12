<?php

use App\Support\Enum\GameType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

final class CreateDeliveriesTable extends Migration
{
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('cargo_id');
            $table->unsignedInteger('from_id');
            $table->unsignedInteger('to_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('distance');
            $table->unsignedInteger('earnings');
            $table->decimal('fuel_used', 8, 2);
            $table->decimal('trailer_damage', 5, 2);
            $table->enum('game_type', GameType::toArray())->default(GameType::SINGLE_PLAYER);
            $table->string('content', 10000)->nullable();

            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('from_id')->references('id')->on('locations');
            $table->foreign('to_id')->references('id')->on('locations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}

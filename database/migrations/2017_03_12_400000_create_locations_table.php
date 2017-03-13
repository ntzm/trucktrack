<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('map_id');
            $table->string('name')->unique();

            $table->foreign('map_id')->references('id')->on('maps');
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
}

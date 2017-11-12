<?php

use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(LocationsSeeder::class);
        $this->call(CargosTableSeeder::class);
    }
}

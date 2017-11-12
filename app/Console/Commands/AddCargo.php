<?php

namespace App\Console\Commands;

use App\Models\Cargo;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;

final class AddCargo extends Command
{
    protected $signature = 'cargo:add {name}';

    protected $description = 'Add a new cargo';

    public function handle()
    {
        $name = $this->argument('name');

        try {
            Cargo::create(compact('name'));
        } catch (QueryException $e) {
            $this->error("Cargo $name already exists!");

            return;
        }

        $this->info("Created cargo $name");
    }
}

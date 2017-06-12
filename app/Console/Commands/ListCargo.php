<?php

namespace App\Console\Commands;

use App\Models\Cargo;
use Illuminate\Console\Command;

class ListCargo extends Command
{
    protected $signature = 'cargo:list';

    protected $description = 'List cargo';

    public function handle()
    {
        Cargo::orderBy('name', 'asc')->get()->each(function (Cargo $cargo) {
            $this->line("- $cargo->name");
        });
    }
}

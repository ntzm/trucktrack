<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

final class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\AddCargo::class,
        Commands\ListCargo::class,
    ];
}

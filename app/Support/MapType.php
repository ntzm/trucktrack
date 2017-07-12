<?php

namespace App\Support;

use MyCLabs\Enum\Enum;

/**
 * @method static MapType DEFAULT()
 * @method static MapType DLC()
 * @method static MapType MOD()
 */
class MapType extends Enum
{
    const DEFAULT = 'default';
    const DLC = 'dlc';
    const MOD = 'mod';
}

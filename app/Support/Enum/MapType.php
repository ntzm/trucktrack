<?php

namespace App\Support\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static MapType DEFAULT()
 * @method static MapType DLC()
 * @method static MapType MOD()
 */
final class MapType extends Enum
{
    public const DEFAULT = 'default';
    public const DLC = 'dlc';
    public const MOD = 'mod';
}

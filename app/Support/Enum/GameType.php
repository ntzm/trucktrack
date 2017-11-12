<?php

namespace App\Support\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static GameType SINGLE_PLAYER()
 * @method static GameType MULTIPLAYER()
 */
final class GameType extends Enum
{
    public const SINGLE_PLAYER = 'Single Player';
    public const MULTIPLAYER = 'Multiplayer';
}

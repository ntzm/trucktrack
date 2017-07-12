<?php

namespace App\Support;

use MyCLabs\Enum\Enum;

/**
 * @method static GameType SINGLE_PLAYER()
 * @method static GameType MULTIPLAYER()
 */
class GameType extends Enum
{
    const SINGLE_PLAYER = 'single player';
    const MULTIPLAYER = 'multiplayer';
}

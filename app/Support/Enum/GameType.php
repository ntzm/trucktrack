<?php

namespace App\Support\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static GameType SINGLE_PLAYER()
 * @method static GameType MULTIPLAYER()
 */
class GameType extends Enum
{
    const SINGLE_PLAYER = 'Single Player';
    const MULTIPLAYER = 'Multiplayer';
}

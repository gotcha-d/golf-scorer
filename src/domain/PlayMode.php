<?php

declare(strict_types=1);

namespace Domain;

enum PlayMode
{
    case FULL;
    case OUT_HALF;
    case IN_HALF;

    public function holeCount(): int
    {
        return match ($this) {
            self::FULL => 18,
            self::IN_HALF => 9,
            self::OUT_HALF => 9,
        };
    }
}

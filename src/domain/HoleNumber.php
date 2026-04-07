<?php

declare(strict_types=1);

namespace Domain;

use InvalidArgumentException;

class HoleNumber
{
    private const MIN = 1;
    private const MAX = 18;

    private int $value;

    public function __construct(int $value)
    {
        if ($value < self::MIN || $value > self::MAX) {
            throw new InvalidArgumentException('ホール番号は1以上18以下である必要があります。');
        }
        $this->value = $value;
    }

    public function __toString(): string
    {
        return sprintf("%dH", $this->value);
    }

    public function equals(HoleNumber $other): bool
    {
        return $this->value === $other->value;
    }
}

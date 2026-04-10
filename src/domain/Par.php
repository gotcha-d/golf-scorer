<?php

declare(strict_types=1);

namespace Domain;

use InvalidArgumentException;

class Par
{
    private const MIN = 3;
    private const MAX = 7;

    private int $value;

    public function __construct(int $value)
    {
        if ($value < self::MIN || $value > self::MAX) {
            throw new InvalidArgumentException('既定打数は3以上7以下である必要があります。');
        }
        $this->value = $value;
    }

    public function toInt(): int
    {
        return $this->value;
    }
}

<?php

declare(strict_types=1);

namespace Domain;

use InvalidArgumentException;

class Score
{
    private const MIN = 1;

    private int $value;

    private function __construct(int $value)
    {
        if ($value < self::MIN) {
            throw new InvalidArgumentException('打数は1以上である必要があります。');
        }
        $this->value = $value;
    }

    public static function from(int $value): self
    {
        return new self($value);
    }

    public function toInt(): int
    {
        return $this->value;
    }
}

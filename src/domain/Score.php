<?php

declare(strict_types=1);

namespace Domain;

class Score
{
    private int $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function from(int $value): self
    {
        return new self($value);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
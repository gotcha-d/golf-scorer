<?php

declare(strict_types=1);

namespace Domain;

class TeeName
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function equals(TeeName $other): bool
    {
        return $this->value === $other->value;
    }
}

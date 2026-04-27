<?php

declare(strict_types=1);

namespace Domain;

class RoundId
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }
}

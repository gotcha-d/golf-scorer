<?php

declare(strict_types=1);

namespace Domain;

class TeeCollection
{
    /** @var array<int, Tee> */
    private array $tees;

    public function __construct(array $tees)
    {
        $this->tees = $tees;
    }

    public function ofName(TeeName $teeName): Tee
    {
        foreach ($this->tees as $tee) {
            if ($tee->name())
        }
    }
}

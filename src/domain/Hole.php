<?php

declare(strict_types=1);

namespace Domain;

class Hole
{
    private HoleNumber $holeNumber;
    private Par $par;

    public function __construct(HoleNumber $holeNumber, Par $par)
    {
        $this->holeNumber = $holeNumber;
        $this->par = $par;
    }

    public function getPar(): int
    {
        return $this->par->getValue();
    }
}
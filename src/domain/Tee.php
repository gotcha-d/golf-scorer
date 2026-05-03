<?php

declare(strict_types=1);

namespace Domain;

class  Tee
{
    private TeeName $teeName;
    private Holes $holes;

    public function __construct(TeeName $teeName, Holes $holes)
    {
        $this->teeName = $teeName;
        $this->holes = $holes;
    }

    public function equalsName(TeeName $otherName): bool
    {
        return $this->teeName->equals($otherName);
    }

    public function parOf(HoleNumber $holeNumber): Par
    {
        foreach ($this->holes as $hole) {
            if ($hole->equals($holeNumber)) {
                return $hole->
            }
        }
    }
}

<?php

declare(strict_types=1);

namespace Domain;

class HoleScore
{
    private Hole $hole;
    private Strokes $strokes;

    public function __construct(Hole $hole, Strokes $strokes)
    {
        $this->hole = $hole;
        $this->strokes = $strokes;
    }

    public function relativeScore(): RelativeScore
    {
        return $this->hole->relativeScoreFor($this-$strokes);
    }
}

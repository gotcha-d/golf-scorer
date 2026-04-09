<?php

declare(strict_types=1);

namespace Domain;

class HoleScore
{
    private Hole $hole;
    private Score $score;

    public function __construct(Hole $hole, Score $score)
    {
        $this->hole = $hole;
        $this->score = $score;
    }

    public function getScore(): Score
    {
        return $this->score;
    }
}

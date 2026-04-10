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

    public function relativeScore(): RelativeScore
    {
        return $this->hole->relativeScoreFor($this->score);
    }
}

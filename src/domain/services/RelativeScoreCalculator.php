<?php

declare(strict_types=1);

namespace Domain\Services;

use Domain\Hole;
use Domain\HoleScore;
use Domain\RelativeScore;

class RelativeScoreCalculator
{
    public function calc(Hole $hole, HoleScore $holeScore): RelativeScore
    {
        return RelativeScore::for($holeScore->getScore(), $hole->getPar());
    }
}
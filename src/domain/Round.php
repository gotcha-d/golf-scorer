<?php
declare(strict_types=1);

namespace Domain;

use Domain\HoleNumber;

class Round
{
    /** @var array<HoleNumber, HoleScore> */
    private array $holeScores = [];

    public function addHoleScore(HoleNumber $homeNumber, HoleScore $holeScore): void
    {
        $this->holeScores[$holeNumber] = $holeScore;
    }
}
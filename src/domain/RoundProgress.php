<?php

declare(strict_types=1);

namespace Domain;

class RoundProgress
{
    private HoleScoreCollection $holeScores;
    private RoundStatus $roundStatus;

    public function __construct(HoleScoreCollection $holeScoreCollection, RoundStatus $roundStatus) {}
}

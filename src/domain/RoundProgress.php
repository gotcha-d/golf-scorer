<?php

declare(strict_types=1);

namespace Domain;

class RoundProgress
{
    private HoleScoreCollection $holeScores;
    private RoundStatus $roundStatus;

    private function __construct(HoleScoreCollection $holeScoreCollection, RoundStatus $roundStatus)
    {
        $this->holeScores = $holeScoreCollection;
        $this->roundStatus = $roundStatus;
    }

    public static function create(): self
    {
        return new self(
            HoleScoreCollection::empty(),
            RoundStatus::IN_PROGRESS
        );
    }
}

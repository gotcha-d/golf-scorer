<?php

declare(strict_types=1);

namespace Domain;

use RoundBody;

class Round
{
    private RoundId $roundId;
    private RoundBody $body;

    public function __construct(
        RoundId $roundId,
        RoundBody $roundBody
    ) {
        $this->roundId = $roundId;
        $this->body = $roundBody;
    }

    public function start(): self
    {
        return new self(
            new RoundId(0),
            RoundBody::start()
        );
    }
    public function record(HoleScore $score): void
    {
        $this->body->record($score);
    }

    public function correct(HoleScore $score): void
    {
        $this->body->correct($score);
    }

    public function remove(HoleNumber $holeNumber): void
    {
        $this->body->remove($holeNumber);
    }
}

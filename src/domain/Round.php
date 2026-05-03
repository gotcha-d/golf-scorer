<?php

declare(strict_types=1);

namespace Domain;

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

    /*
     * ラウンドを開始する
     *
     * メソッドのシグネチャは業務の言葉で表現する
     */
    public static function create(PlayedCourse $playedCourse, PlayMode $playMode): self
    {
        return new self(
            new RoundId(0), // TODO: 仮で0とする
            RoundBody::create($playedCourse, $playMode)
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

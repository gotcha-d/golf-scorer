<?php

declare(strict_types=1);

namespace Domain;

class Round
{
    private RoundId $roundId;
    private HoleScoreCollection $holeScores;

    public function __construct(RoundId $roundId, HoleScoreCollection $holeScores)
    {
        $this->roundId = $roundId;
        $this->holeScores = $holeScores;
    }

    public static function from(Course $course, array $scores): self {
        $holes = $course->getHoles();
        // 入力された層を変換する
        foreach($scores as $index => $score) { // HACK: 素の配列よりも、strokeのコレクションの方がドメイン知識を再現できている気がする
            $holeNumber = new HoleNumber($index);
            $par = $holes->parOf($holeNumber);
            $holeScoreCollection->getPar

        }
        HoleScoreCollection::of($holeScores)
        for($i = $from; $to <= $to; $i++) {
            $par = $holes->parOf($i);

        }
        return new self(
            0, // TODO: 0は仮置き。別途uuidなどの利用を検討する
            $roundScoreCollection
        )
        foreach ($courese as )
    }
}

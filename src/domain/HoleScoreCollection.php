<?php

declare(strict_types=1);

namespace Domain;

use InvalidArgumentException;

/**
 * HoleScoreのファーストクラスコレクション
 */
class HoleScoreCollection
{
    /** @var HoleScore[] */
    private array $holeScores;

    /**
     * @param HoleScore[] $holeScores
     */
    private function __construct(array $holeScores)
    {
        $this->holeScores = $holeScores;
    }

    /**
     * @param HoleScore[] $holeScores
     */
    public static function of(array $holeScores): self
    {
        return new self($holeScores);
    }

    public function add(HoleScore $holeScore): void
    {
        if ($this->containsSameHole($holeScore)) {
            throw new InvalidArgumentException('すでにスコア登録されたホールです');
        }
        $this->holeScores[] = $holeScore;
    }

    public function replace(HoleScore $newScore): void
    {
        if (!$this->containsSameHole($newScore)) {
            throw new InvalidArgumentException('対象のホールのスコアは未登録です');
        }
        $this->holeScores = array_map(
            fn(HoleScore $registeredScore) => $registeredScore->replaceOrSelf($newScore),
            $this->holeScores
        );
    }

    public function remove(HoleNumber $holeNumber): void
    {
        if (!$this->hasScoreFor($holeNumber)) {
            throw new InvalidArgumentException('対象のホールのスコアは未登録です');
        }
        $this->holeScores = array_values(
            array_filter($this->holeScores, fn(HoleScore $registeredScore) => !$registeredScore->isFor($holeNumber))
        );
    }

    public function hasScoreFor(HoleNumber $holeNumber): bool
    {
        return array_any($this->holeScores, fn(HoleScore $score) => $score->isFor($holeNumber));
    }

    public function containsSameHole(HoleScore $otherScore): bool
    {
        return array_any(
            $this->holeScores,
            fn(HoleScore $registeredScore) => $registeredScore->isSameHoleAs($otherScore)
        );
    }

    public function isAllRecorded(PlayMode $playMode): bool
    {
        return count($this->holeScores) === $playMode->holeCount();
    }
}

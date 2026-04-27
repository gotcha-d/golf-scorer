<?php

declare(strict_types=1);

namespace Domain;

/**
 * ホールスコアのバリューオブジェクト
 * Roundの外から参照されることはない。よって、ライフサイクルは完全にRoundに従属している。
 */
class HoleScore
{
    private HoleNumber $holeNumber;
    private Par $par;
    private Strokes $strokes;

    public function __construct(HoleNumber $holeNumber, Par $par, Strokes $strokes)
    {
        $this->holeNumber = $holeNumber;
        $this->par = $par;
        $this->strokes = $strokes;
    }

    public function isFor(HoleNumber $holeNumber): bool
    {
        return $this->holeNumber->equals($holeNumber);
    }

    public function isSameHoleAs(HoleScore $other): bool
    {
        return $this->isFor($other->holeNumber);
    }

    public function replaceOrSelf(HoleScore $new): HoleScore
    {
        if ($this->isSameHoleAs($new)) {
            return $new;
        }
        return $this;
    }

    public function relativeScoreFor(): RelativeScore
    {
        return RelativeScore::from($this->strokes, $this->par);
    }
}

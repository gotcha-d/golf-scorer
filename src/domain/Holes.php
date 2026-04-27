<?php

namespace Domain;

/**
 * Holeを束ねるファーストクラスコレクション
 */
class Holes
{
    /* @var array<int, Hole> */
    private array $holes;

    /**
     * @param Hole[] $holes
     */
    public function __construct(array $holes)
    {
        $this->holes = $holes;
    }

    public static function empty(): self
    {
        return new self([]);
    }

    public function add(Hole $hole): self
    {
        return new self([...$this->holes, $hole]);
    }

    public function parOf(HoleNumber $holeNumber): Par
    {
        return $this->holes[$holeNumber->value()]->par();
    }
}

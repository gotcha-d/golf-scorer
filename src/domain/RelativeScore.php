<?php

declare(strict_types=1);

namespace Domain;

class RelativeScore
{
    private int $value;

    public function __construct(int $value)
    {
        // TODO: あとでビジネスルールを検討する
        $this->value = $value;
    }

    public static function for(Score $score, Par $par) {
        return new self($score->toInt() - $par->toInt());
    }
}
<?php

declare(strict_types=1);

namespace Domain;

use Symfony\Component\HttpKernel\HttpCache\Store;

class RelativeScore
{
    private int $value;

    public function __construct(int $value)
    {
        // 名前付きコンストラクタでビジネスルールが表現されるので、
        // -100以下はビジネス上許可しない、などの制約が生まれた場合はバリデーションを追加する。
        $this->value = $value;
    }

    public static function from(Strokes $strokes, Par $par): self
    {
        return new self(
                $strokes->toInt() - $par->toInt()
            );
    }
}

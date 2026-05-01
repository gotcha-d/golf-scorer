<?php

declare(strict_types=1);

namespace Domain;

class RoundBody
{
    // ラウンド開始時のコース情報 スナップショットで不変
    private RoundSetup $roundSetup;
    // スコアなど、ラウンド進行に応じて更新される情報 可変
    private RoundProgress $roundProgress;

    private function __construct(RoundSetup $roundSetup, RoundProgress $roundProgress)
    {
        $this->roundSetup =  $roundSetup;
        $this->roundProgress = $roundProgress;
    }

    public static function start(RoundSetup $roundSetup): self
    {
        return new self()
    }
}

<?php

declare(strict_types=1);

namespace Domain;

class HoleScore
{
    private Hole $hole;
    private Score $score;

    public function __construct(Hole $hole, Score $score)
    {
        $this->hole = $hole;
        $this->score = $score;
    }

    public function getRawScore(): Score
    {
        return $this->score;
    }

    /**
     * ホールの規定打数に対する相対スコアを返す
     *
     * このメソッドの定義先の候補は以下の候補があった。
     * 生のスコア(打数)の言い換えであるので、HoleScore自身で計算すべきと判断した
     *   1. HoleクラスでScoreを受け取って計算する
     *   2. このクラス自身のインスタンス変数を使って計算
     *   3. 別途計算クラスを用意
     *
     * @param Score $score
     * @return integer
     */
    public function calculateRelative(): int
    {
        return $this->hole->getPar() - $this->score->getValue();
    }
}
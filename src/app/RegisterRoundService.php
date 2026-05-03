<?php

use Domain\ICourseRepository;
use Domain\PlayMode;
use Domain\Round;
use Domain\TeeName;

class RegisterRoundService
{
    private ICourseRepository $courseRepository;

    public function __construct(ICourseRepository $iCourseRepository)
    {
        $this->courseRepository = $this->courseRepository;
    }

    public function execute(int $courseId, string $strTeeName, string $strPlayMode): void
    {
        $teeName = new TeeName($strTeeName);
        $playMode = PlayMode::tryfrom($strPlayMode);
        if (!$playMode) {
            throw new Exception("プレーモードが不正です");
        }
        // Course 取得
        $course = $this->courseRepository->findByCourseId($courseId);
        if (!$course) {
            throw new Exception("指定されたIDのコースは存在しません");
        }
        if ($course->hasTee($teeName)) {
            throw new Exception("指定されたティーは存在しません");
        }
        // コースのスナップショットを作成
        $playedCouese = $course->play($teeName);
        // ラウンドを開始する
        $round = Round::create($playedCouese, $playMode);
    }
}

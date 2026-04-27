<?php

use Domain\ICourseRepository;
use Domain\Round;

class RegisterRoundService
{
    private ICourseRepository $courseRepository;

    public function __construct(ICourseRepository $iCourseRepository)
    {
        $this->courseRepository = $this->courseRepository;
    }

    public function execute(int $courseId, array $scores): void
    {
        $course = $this->courseRepository->findByCourseId($courseId);
        $round ()
    }
}

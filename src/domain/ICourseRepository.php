<?php

declare(strict_types=1);

namespace Domain;

interface ICourseRepository
{
    public function findByCourseId(int $courseId): Course;
}

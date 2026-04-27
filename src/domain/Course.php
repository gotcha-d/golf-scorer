<?php

declare(strict_types=1);

namespace Domain;

/**
 * コース
 */
class Course
{
    private CourseId $courseId;
    private CourseName $name;
    private Holes $holes;

    public function __construct(CourseId $courseId, CourseName $courseName, Holes $holes)
    {
        $this->courseId = $courseId;
        $this->name = $courseName;
        $this->holes = $holes;
    }

    public function parOf(HoleNumber $holeNumber): Par
    {
        return $this->holes->parOf($holeNumber);
    }
}

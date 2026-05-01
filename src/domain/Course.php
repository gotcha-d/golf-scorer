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
    private TeeCollection $tees;

    public function __construct(CourseId $courseId, CourseName $courseName, TeeCollection $tees)
    {
        $this->courseId = $courseId;
        $this->name = $courseName;
        $this->tees = $tees;
    }

    public function parOf(TeeName $teeNma, HoleNumber $holeNumber): Par
    {
        return $this->tees->parOf($teeName, $holeNumber);
    }

    public function play(TeeName $teeName): PlayedCourse
    {
        return new PlayedCourse(
            $this->name,
            $this->tees->pick($teeName)
        );
    }
}

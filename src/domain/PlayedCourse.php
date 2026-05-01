<?php




declare(strict_types=1);

namespace Domain;

class PlayedCourse
{
    private CourseName $courseName;
    private Tee $tee;

    public function __construct(CourseName $courseName, Tee $tee)
    {
        $this->courseName = $courseName;
        $this->tee = $tee;
    }
}

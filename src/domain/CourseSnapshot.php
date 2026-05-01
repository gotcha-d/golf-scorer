<?php





declare(strict_types=1);

namespace Domain;

class CourseSnapshot
{
    private Holes $holeColection;
    private CourseName $courseName;

    private function __construct(Holes $holeCollection, CourseName $courseName)
    {
        $this->holeColection = $holeCollection;
        $this->courseName = $courseName;
    }

    public function from(Course $course): self {}
}

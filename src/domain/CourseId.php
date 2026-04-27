<?php

declare(strict_types=1);

namespace Domain;

class CourseId
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function equals(CourseId $other): bool
    {
        return $this->value === $other->value;
    }
}

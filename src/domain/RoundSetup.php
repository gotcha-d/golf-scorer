<?php

declare(strict_types=1);

namespace Domain;

class RoundSetup
{
    private PlayMode $plaMode;
    private PlayedCourse $playedCourse;

    public function __construct(PlayMode $playMode, PlayedCourse $playedCourse)
    {
        $this->plaMode = $playMode;
        $this->playedCourse = $playedCourse;
    }
}

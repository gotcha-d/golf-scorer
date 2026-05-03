<?php

declare(strict_types=1);

namespace Domain;

class RoundSetup
{
    private PlayMode $playMode;
    private PlayedCourse $playedCourse;

    public function __construct(PlayedCourse $playedCourse, PlayMode $playMode)
    {
        $this->playMode = $playMode;
        $this->playedCourse = $playedCourse;
    }
}

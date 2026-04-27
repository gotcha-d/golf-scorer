<?php

declare(strict_types=1);

namespace Domain;

enum RoundStatus
{
    case IN_PROGRESS;
    case COMPLETED;
    case ABABDONED;
}

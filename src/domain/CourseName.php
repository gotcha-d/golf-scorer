<?php

namespace Domain;

use Uri\InvalidUriException;

class CourseName
{
    private const MIN = 1;
    private const MAX = 100;

    private string $value;

    public function __construct(string $value)
    {
        if (mb_strlen($value) < self::MIN || mb_strlen($value) > self::MAX) {
            throw new InvalidUriException('コース名は1文字以上100も以下である必要があります。');
        }
        $this->value = $value;
    }

    public function equals(CourseName $other): bool
    {
        return $this->value === $other->value;
    }
}

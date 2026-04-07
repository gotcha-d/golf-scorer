<?php

declare(strict_types=1);

namespace Tests\Unit\Domain;

use Domain\HoleNumber;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class HoleNumberTest extends TestCase
{
    public function test_同じホール番号は同一と判断される()
    {
        $holeNumber1 = new HoleNumber(1);
        $holeNumber2 = new HoleNumber(1);
        $this->assertTrue($holeNumber1->equals($holeNumber2));
        $this->assertTrue($holeNumber2->equals($holeNumber1));
    }

    public function test_異なるホール番号は同一ではないと判断される()
    {
        $holeNumber1 = new HoleNumber(1);
        $holeNumber2 = new HoleNumber(2);
        $this->assertFalse($holeNumber1->equals($holeNumber2));
        $this->assertFalse($holeNumber2->equals($holeNumber1));
    }

    public function test_フォーマットされ末尾にHがついた形式で返す()
    {
        $holeNumber = new HoleNumber(9);
        $this->assertEquals("9H", (string)$holeNumber);
    }

    public function test_最小値1でホール番号を保持できる()
    {
        $hole1 = new HoleNumber(1);
        $this->assertEquals('1H', (string)$hole1);
    }

    public function test_最大値18でホール番号を保持できる()
    {
        $hole18 = new HoleNumber(18);
        $this->assertEquals('18H', (string)$hole18);
    }

    public function test_番号が1より小さいときは例外が発生する()
    {
        $this->expectException(InvalidArgumentException::class);
        $holeNumber = new HoleNumber(0);
    }

    public function test_番号が18より大きい時は例外が発生する()
    {
        $this->expectException(InvalidArgumentException::class);
        $holeNumber = new HoleNumber(19);
    }
}

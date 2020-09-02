<?php

namespace Slutsky\EnumExample\Test;

use BadMethodCallException;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Slutsky\EnumExample\Color;

class ColorTest extends TestCase
{
    public function testEquality(): void
    {
        $firstRed = Color::red();
        $secondRed = Color::red();
        $firstBlack = Color::black();
        $secondBlack = Color::black();

        $this->assertTrue($firstRed == $secondRed);
        $this->assertTrue($firstBlack == $secondBlack);
        $this->assertFalse($firstRed == $secondBlack);
        $this->assertTrue($firstRed === $secondRed);
        $this->assertTrue($firstBlack === $secondBlack);
        $this->assertFalse($firstRed === $secondBlack);
    }

    public function testWrongColorCreationMethod(): void
    {
        $this->expectException(BadMethodCallException::class);

        $pinkColor = Color::pink();
    }

    public function testCreationMethodWithWrongArguments(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $redColor = Color::red('some argument');
    }

    public function testFromMethodWithWrongArguments(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $redColor = Color::from('pink');
    }

    public function testStringConcatenation(): void
    {
        $value = Color::cyan() . ' ' . Color::green() . ' ' . Color::magenta();

        $this->assertIsString($value);
        $this->assertSame('cyan green magenta', $value);
    }
}

<?php

namespace Slutsky\EnumExample\Test;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Slutsky\EnumExample\Season;

class SeasonTest extends TestCase
{
    public function testCreation(): void
    {
        $summer = new Season(Season::SUMMER);
        $autumn = new Season(Season::AUTUMN);
        $winter = new Season(Season::WINTER);
        $spring = new Season(Season::SPRING);

        $this->expectException(InvalidArgumentException::class);

        $wrongSeason = new Season('Wrong season');
    }

    public function testStringConcatenation(): void
    {
        $autumn = new Season(Season::AUTUMN);
        $spring = new Season(Season::SPRING);
        $value = $autumn . ' ' . $spring;

        $this->assertIsString($value);
        $this->assertSame(Season::AUTUMN . ' ' . Season::SPRING, $value);
    }

    public function testEquality(): void
    {
        $firstSummer = new Season(Season::SUMMER);
        $secondSummer = new Season(Season::SUMMER);
        $winter = new Season(Season::WINTER);

        $this->assertTrue($firstSummer == $secondSummer);
        $this->assertFalse($firstSummer == $winter);
        $this->assertFalse($firstSummer === $secondSummer);
        $this->assertFalse($firstSummer === $winter);
    }

    public function testEquals(): void
    {
        $firstSummer = new Season(Season::SUMMER);
        $secondSummer = new Season(Season::SUMMER);
        $firstWinter = new Season(Season::WINTER);
        $secondWinter = new Season(Season::WINTER);

        $this->assertTrue($firstSummer->equals($secondSummer));
        $this->assertTrue($firstWinter->equals($secondWinter));
        $this->assertFalse($firstSummer->equals($secondWinter));
    }
}

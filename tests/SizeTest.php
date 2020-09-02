<?php

namespace Slutsky\EnumExample\Test;

use BadMethodCallException;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Slutsky\EnumExample\Size;

class SizeTest extends TestCase
{
    public function testEquality(): void
    {
        $firstXxl = Size::xxl();
        $secondXxl = Size::xxl();
        $firstXxs = Size::xxs();
        $secondXxs = Size::xxs();

        $this->assertTrue($firstXxl == $secondXxl);
        $this->assertTrue($firstXxs == $secondXxs);
        $this->assertFalse($firstXxl == $secondXxs);
        $this->assertFalse($firstXxl === $secondXxl);
        $this->assertFalse($firstXxs === $secondXxs);
        $this->assertFalse($firstXxl === $secondXxs);
    }

    public function testWrongColorCreationMethod(): void
    {
        $this->expectException(BadMethodCallException::class);

        $pinkColor = Size::xxxs();
    }

    public function testCreationMethodWithWrongArguments(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $redColor = Size::xs('some argument');
    }

    public function testStringConcatenation(): void
    {
        $value = Size::xs() . ' ' . Size::xl();

        $this->assertIsString($value);
        $this->assertSame('xs xl', $value);
    }
}

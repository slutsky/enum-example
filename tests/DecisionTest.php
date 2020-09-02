<?php

namespace Slutsky\EnumExample\Test;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Slutsky\EnumExample\Decision;

class DecisionTest extends TestCase
{
    public function testStringConcatenation(): void
    {
        $agree = Decision::agree();
        $hold = Decision::hold();
        $value = $agree . ' ' . $hold;

        $this->assertIsString($value);
        $this->assertSame(Decision::AGREE . ' ' . Decision::HOLD, $value);
    }

    public function testEquality(): void
    {
        $firsAgree = Decision::agree();
        $secondAgree = Decision::agree();
        $firstDisagree = Decision::disagree();
        $secondDisagree = Decision::disagree();

        $this->assertTrue($firsAgree == $secondAgree);
        $this->assertTrue($firstDisagree == $secondDisagree);
        $this->assertFalse($firsAgree == $secondDisagree);
        $this->assertTrue($firsAgree === $secondAgree);
        $this->assertTrue($firstDisagree === $secondDisagree);
        $this->assertFalse($firsAgree === $secondDisagree);
    }

    public function testFrom(): void
    {
        $agree = Decision::from(Decision::AGREE);
        $disagree = Decision::from(Decision::DISAGREE);
        $hold = Decision::from(Decision::HOLD);
        $secondHold = Decision::from($hold);

        $this->assertTrue($hold === $secondHold);

        $this->expectException(InvalidArgumentException::class);

        $wrongDecision = Decision::from('Wrong decision');
    }
}

<?php

namespace Slutsky\EnumExample\Test;

use PHPUnit\Framework\TestCase;
use Slutsky\EnumExample\MicrophoneConnector;

class MicrophoneConnectorTest extends TestCase
{
    public function testStringConcatenation(): void
    {
        $jack = MicrophoneConnector::jack();
        $usb = MicrophoneConnector::usb();
        $value = $jack . ' ' . $usb;

        $this->assertIsString($value);
        $this->assertSame(MicrophoneConnector::JACK . ' ' . MicrophoneConnector::USB, $value);
    }

    public function testEquality(): void
    {
        $firstJack = MicrophoneConnector::jack();
        $secondJack = MicrophoneConnector::jack();
        $xlr3pin = MicrophoneConnector::xlr3pin();

        $this->assertTrue($firstJack == $secondJack);
        $this->assertFalse($firstJack == $xlr3pin);
        $this->assertFalse($firstJack === $secondJack);
        $this->assertFalse($firstJack === $xlr3pin);
    }
}
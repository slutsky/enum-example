<?php

namespace Slutsky\EnumExample;

class MicrophoneConnector
{
    public const JACK = 'jack';
    public const MINI_JACK = 'mini_jack';
    public const USB = 'usb';
    public const XLR_3PIN = 'xlr_3pin';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function jack(): self
    {
        return new self(self::JACK);
    }

    public static function miniJack(): self
    {
        return new self(self::MINI_JACK);
    }

    public static function usb(): self
    {
        return new self(self::USB);
    }

    public static function xlr3pin(): self
    {
        return new self(self::XLR_3PIN);
    }
}

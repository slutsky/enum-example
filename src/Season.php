<?php

namespace Slutsky\EnumExample;

use InvalidArgumentException;

class Season
{
    public const SUMMER = 'summer';
    public const AUTUMN = 'autumn';
    public const WINTER = 'winter';
    public const SPRING = 'spring';

    private string $value;

    public function __construct(string $value)
    {
        if (
            self::SUMMER !== $value &&
            self::AUTUMN !== $value &&
            self::WINTER !== $value &&
            self::SPRING !== $value
        ) {
            throw new InvalidArgumentException(sprintf(
                "Wrong season value. Awaited '%s', '%s', '%s' or '%s'.",
                self::SUMMER,
                self::AUTUMN,
                self::WINTER,
                self::SPRING
            ));
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(Season $season): bool
    {
        return $this->value === $season->value;
    }
}
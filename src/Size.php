<?php

namespace Slutsky\EnumExample;

use BadMethodCallException;
use InvalidArgumentException;

/**
 * @method static Size xxs()
 * @method static Size xs()
 * @method static Size s()
 * @method static Size m()
 * @method static Size l()
 * @method static Size xl()
 * @method static Size xxl()
 */
class Size
{
    public const SIZES = ['xxs', 'xs', 's', 'm', 'l', 'xl', 'xxl'];

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function __callStatic($name, $arguments)
    {
        $value = strtolower($name);
        if (!in_array($value, self::SIZES)) {
            throw new BadMethodCallException("Method '$name' not found.");
        }

        if (count($arguments) > 0) {
            throw new InvalidArgumentException("Method '$name' expected no arguments.");
        }

        return new self($value);
    }
}

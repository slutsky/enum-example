<?php

namespace Slutsky\EnumExample;

use BadMethodCallException;
use InvalidArgumentException;

/**
 * @method static Color red()
 * @method static Color green()
 * @method static Color blue()
 * @method static Color cyan()
 * @method static Color magenta()
 * @method static Color yellow()
 * @method static Color black()
 */
class Color
{
    public const COLORS = [
        'red',
        'green',
        'blue',
        'cyan',
        'magenta',
        'yellow',
        'black',
    ];

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    private function __clone() { }

    public function __toString(): string
    {
        return $this->value;
    }

    private static $instances = [];

    public static function from($value): self
    {
        if (!in_array($value, self::COLORS)) {
            throw new InvalidArgumentException(sprintf(
                "Wrong color value: '$value'. Expected one from: '%s'.",
                implode("', '", self::COLORS)
            ));
        }

        if (!array_key_exists($value, self::$instances)) {
            self::$instances[$value] = new self($value);
        }

        return self::$instances[$value];
    }

    public static function __callStatic($name, $arguments)
    {
        $value = strtolower($name);
        if (!in_array($value, self::COLORS)) {
            throw new BadMethodCallException("Method '$name' not found.");
        }

        if (count($arguments) > 0) {
            throw new InvalidArgumentException("Method '$name' expected no arguments.");
        }

        return self::from($value);
    }
}

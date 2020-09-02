<?php

namespace Slutsky\EnumExample;

use InvalidArgumentException;

class Decision
{
    public const AGREE = 'agree';
    public const DISAGREE = 'disagree';
    public const HOLD = 'hold';

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

    private static $agreeInstance = null;
    private static $disagreeInstance = null;
    private static $holdInstance = null;

    public static function agree(): self
    {
        if (null === self::$agreeInstance) {
            self::$agreeInstance = new self(self::AGREE);
        }

        return self::$agreeInstance;
    }

    public static function disagree(): self
    {
        if (null === self::$disagreeInstance) {
            self::$disagreeInstance = new self(self::DISAGREE);
        }

        return self::$disagreeInstance;
    }

    public static function hold(): self
    {
        if (null === self::$holdInstance) {
            self::$holdInstance = new self(self::HOLD);
        }

        return self::$holdInstance;
    }

    public static function from($value): self
    {
        switch ($value) {
            case self::AGREE:
                return self::agree();

            case self::DISAGREE:
                return self::disagree();

            case self::HOLD: 
                return self::hold();

            default:
                throw new InvalidArgumentException(sprintf(
                    "Wrong decision value. Awaited '%s', '%s' or '%s'.",
                    self::AGREE,
                    self::DISAGREE,
                    self::HOLD
                ));
        }
    }
}
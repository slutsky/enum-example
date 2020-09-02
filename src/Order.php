<?php

namespace Slutsky\EnumExample;

class Order
{
    private Decision $decision;
    private string $description;

    public function getDecision(): Decision
    {
        return $this->decision;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function __construct(Decision $decision, string $description)
    {
        $this->decision = $decision;
        $this->description = $description;
    }

    public function __sleep(): array
    {
        return ['decision', 'description'];
    }

    public function __wakeup(): void
    {
        $this->decision = Decision::from($this->decision);
    }
}
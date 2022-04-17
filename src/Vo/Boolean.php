<?php

namespace RenanDelmonico\Vo;

class Boolean implements ValueObjectContract
{
    use ValueObjectBehaviors;

    public function __construct(
        public readonly bool $value
    )
    {}

    public function getValue(): bool
    {
        return $this->value;
    }

    public function isTrue(): bool
    {
        return $this->value === true;
    }

    public function isFalse(): bool
    {
        return $this->value === false;
    }
}

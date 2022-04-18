<?php

namespace RenanDelmonico\Vo;

class Boolean implements ValueObjectContract
{
    use ValueObjectBehaviors;

    /**
     * @param boolean $value
     */
    public function __construct(
        public readonly bool $value
    )
    {}

    /**
     * @return boolean
     */
    public function getValue(): bool
    {
        return $this->value;
    }

    /**
     * @return boolean
     */
    public function isTrue(): bool
    {
        return $this->value === true;
    }

    /**
     * @return boolean
     */
    public function isFalse(): bool
    {
        return $this->value === false;
    }
}

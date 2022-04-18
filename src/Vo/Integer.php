<?php

namespace RenanDelmonico\Vo;

class Integer extends Math
{
    /**
     * @param integer $value
     */
    public function __construct(
        public readonly int $value
    ) {}

    /**
     * @return integer
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param Math $value
     * @return Math
     */
    public function sum(Math $value): Math
    {
        $value = $this->getValue() + $value->getValue();

        return $this->returnValue($value);
    }

    /**
     * @param Math $value
     * @return Math
     */
    public function minus(Math $value): Math
    {
        $value = $this->getValue() - $value->getValue();

        return $this->returnValue($value);
    }

    /**
     * @param Math $value
     * @return Math
     */
    public function multi(Math $value): Math
    {
        $value = $this->getValue() * $value->getValue();

        return $this->returnValue($value);
    }

    /**
     * @param Math $value
     * @return Math
     */
    public function div(Math $value): Math
    {
        $value = $this->getValue() / $value->getValue();

        return $this->returnValue($value);
    }

    /**
     * @param integer|float $value
     * @return Math
     */
    private function returnValue(int|float $value): Math
    {
        if (is_float($value)) {
            return new Numeric($value);
        }

        return new Integer($value);
    }
}

<?php

namespace RenanDelmonico\Vo;

class Integer extends Math
{
    public function __construct(
        public readonly int $value
    ) {}

    public function getValue(): int
    {
        return $this->value;
    }

    public function sum(Math $value): Math
    {
        $value = $this->getValue() + $value->getValue();

        return $this->returnValue($value);
    }

    public function minus(Math $value): Math
    {
        $value = $this->getValue() - $value->getValue();

        return $this->returnValue($value);
    }

    public function multi(Math $value): Math
    {
        $value = $this->getValue() * $value->getValue();

        return $this->returnValue($value);
    }

    public function div(Math $value): Math
    {
        $value = $this->getValue() / $value->getValue();

        return $this->returnValue($value);
    }

    private function returnValue(int|float $value): Math
    {
        if (is_float($value)) {
            return new Numeric($value);
        }

        return new Integer($value);
    }
}

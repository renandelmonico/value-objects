<?php

namespace RenanDelmonico\Vo;

class Numeric extends Math
{
    public function __construct(
        public readonly float $value
    ) {}

    public function getValue(): float
    {
        return $this->value;
    }

    public function sum(Math $value): Numeric
    {
        return new self($this->getValue() + $value->getValue());
    }

    public function minus(Math $value): Numeric
    {
        return new self($this->getValue() - $value->getValue());
    }

    public function multi(Math $value): Numeric
    {
        return new self($this->getValue() * $value->getValue());
    }

    public function div(Math $value): Numeric
    {
        return new self($this->getValue() / $value->getValue());
    }

    public function round(int $precision, int $mode = PHP_ROUND_HALF_UP): Numeric
    {
        return new Numeric(round($this->getValue(), $precision, $mode));
    }
}

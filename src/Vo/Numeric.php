<?php

namespace RenanDelmonico\Vo;

readonly class Numeric extends Math
{
    /**
     * @param float $value
     */
    public function __construct(
        public float $value
    ) {}

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param Math $value
     * @return Numeric
     */
    public function sum(Math $value): Numeric
    {
        return new self($this->getValue() + $value->getValue());
    }

    /**
     * @param Math $value
     * @return Numeric
     */
    public function minus(Math $value): Numeric
    {
        return new self($this->getValue() - $value->getValue());
    }

    /**
     * @param Math $value
     * @return Numeric
     */
    public function multi(Math $value): Numeric
    {
        return new self($this->getValue() * $value->getValue());
    }

    /**
     * @param Math $value
     * @return Numeric
     */
    public function div(Math $value): Numeric
    {
        return new self($this->getValue() / $value->getValue());
    }

    /**
     * @param integer $precision
     * @param integer $mode
     * @return Numeric
     */
    public function round(int $precision, int $mode = PHP_ROUND_HALF_UP): Numeric
    {
        return new Numeric(round($this->getValue(), $precision, $mode));
    }
}

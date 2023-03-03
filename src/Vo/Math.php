<?php

namespace RenanDelmonico\Vo;

readonly abstract class Math implements ValueObjectContract
{
    use ValueObjectBehaviors;

    /**
     * @param Math $value
     * @return Math
     */
    abstract public function sum(Math $value): Math;

    /**
     * @param Math $value
     * @return Math
     */
    abstract public function minus(Math $value): Math;

    /**
     * @param Math $value
     * @return Math
     */
    abstract public function multi(Math $value): Math;

    /**
     * @param Math $value
     * @return Math
     */
    abstract public function div(Math $value): Math;

    /**
     * @param Math $value
     * @return boolean
     */
    public function gte(Math $value): bool
    {
        return $this->getValue() >= $value->getValue();
    }

    /**
     * @param Math $value
     * @return boolean
     */
    public function gt(Math $value): bool
    {
        return $this->getValue() > $value->getValue();
    }

    /**
     * @param Math $value
     * @return boolean
     */
    public function lte(Math $value): bool
    {
        return $this->getValue() <= $value->getValue();
    }

    /**
     * @param Math $value
     * @return boolean
     */
    public function lt(Math $value): bool
    {
        return $this->getValue() < $value->getValue();
    }
}

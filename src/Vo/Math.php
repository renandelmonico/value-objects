<?php

namespace RenanDelmonico\Vo;

abstract class Math implements ValueObjectContract
{
    use ValueObjectBehaviors;

    abstract public function sum(Math $value): Math;

    abstract public function minus(Math $value): Math;

    abstract public function multi(Math $value): Math;

    abstract public function div(Math $value): Math;

    public function gte(Math $value): bool
    {
        return $this->getValue() >= $value->getValue();
    }

    public function gt(Math $value): bool
    {
        return $this->getValue() > $value->getValue();
    }

    public function lte(Math $value): bool
    {
        return $this->getValue() <= $value->getValue();
    }

    public function lt(Math $value): bool
    {
        return $this->getValue() < $value->getValue();
    }
}

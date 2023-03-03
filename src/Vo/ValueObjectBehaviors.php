<?php

namespace RenanDelmonico\Vo;

trait ValueObjectBehaviors
{
    /**
     * @param ValueObjectContract $value
     * @return boolean
     */
    public function eq(ValueObjectContract $value): bool
    {
        return $this->getValue() === $value->getValue();
    }
}

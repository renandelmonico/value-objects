<?php

namespace RenanDelmonico\Vo;

use RenanDelmonico\Vo\ValueObjectContract;

trait ValueObjectBehaviors
{
    public function eq(ValueObjectContract $value): bool
    {
        return $this->getValue() === $value->getValue();
    }
}

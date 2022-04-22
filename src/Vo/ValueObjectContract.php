<?php

namespace RenanDelmonico\Vo;

interface ValueObjectContract extends Immutable
{
    /**
     * @return mixed
     */
    public function getValue(): mixed;

    /**
     * @param ValueObjectContract $value
     * @return boolean
     */
    public function eq(ValueObjectContract $value): bool;
}

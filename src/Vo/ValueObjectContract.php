<?php

namespace RenanDelmonico\Vo;

interface ValueObjectContract
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

<?php

namespace RenanDelmonico\Vo;

interface ValueObjectContract
{
    public function getValue(): mixed;

    public function eq(ValueObjectContract $value): bool;
}

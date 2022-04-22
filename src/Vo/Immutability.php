<?php

namespace RenanDelmonico\Vo;

use RenanDelmonico\Vo\Exception\ImmutabilityException;

trait Immutability
{
    /**
     * @param string $name
     * @param mixed $value
     * @return void
     * @throws ImmutabilityException
     */
    public function __set(string $name, mixed $value): void
    {
        throw new ImmutabilityException(message: 'SET_IMMUTABLE_STATE');
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return property_exists(object_or_class: $this, property: $name);
    }

    /**
     * @param $key
     * @throws ImmutabilityException
     */
    public function __get($key): void
    {
        if (!$this->__isset(name: $key)) {
            throw new ImmutabilityException(message: 'GET_UNDEFINED_OF_IMMUTABLE');
        }
    }

    /**
     * @param string $name
     * @throws ImmutabilityException
     */
    public function __unset(string $name): void
    {
        throw new ImmutabilityException(message: 'UNSET_IMMUTABLE');
    }
}
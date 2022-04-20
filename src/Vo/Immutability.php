<?php

namespace RenanDelmonico\Vo;

use Exception;

trait Immutability
{
    /**
     * @param string $name
     * @param mixed $value
     * @return void
     * @throws Exception
     */
    public function __set(string $name, mixed $value): void
    {
        throw new Exception(message: 'SET_IMMUTABLE_STATE');
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
     * @throws Exception
     */
    public function __get($key): void
    {
        if (!$this->__isset(name: $key)) {
            throw new Exception(message: 'GET_UNDEFINED_OF_IMMUTABLE');
        }
    }

    /**
     * @param string $name
     * @throws Exception
     */
    public function __unset(string $name): void
    {
        throw new Exception(message: 'UNSET_IMMUTABLE');
    }
}
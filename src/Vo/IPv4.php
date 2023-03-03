<?php

namespace RenanDelmonico\Vo;

readonly class IPv4 extends IP
{
    /**
     * @param string $value
     * @return boolean
     */
    protected function validate(string $value): bool
    {
        $isValid = filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;

        return $isValid;
    }
}

<?php

namespace RenanDelmonico\Vo;

readonly class IPv6 extends IP
{
    /**
     * @param string $value
     * @return boolean
     */
    protected function validate(string $value): bool
    {
        $isValid = filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;

        return $isValid;
    }
}

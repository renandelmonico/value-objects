<?php

namespace RenanDelmonico\Vo;

use RenanDelmonico\Vo\City;
use RenanDelmonico\Vo\Str;
use RenanDelmonico\Vo\ValueObjectBehaviors;
use RenanDelmonico\Vo\ValueObjectContract;

class Address implements ValueObjectContract
{
    use ValueObjectBehaviors;

    public function __construct(
        private readonly Str $street,
        private readonly Str $number,
        private readonly Str $district,
        private readonly Str $zipCode,
        private readonly City $city,
        private readonly ?Str $complement = null
    )
    {}

    public function getValue(): string
    {
        return sprintf(
            '%s, %s%s - %s - %s',
            $this->street->getValue(),
            $this->number->getValue(),
            $this->complement ? ' - ' . $this->complement->getValue() : '',
            $this->district->getValue(),
            $this->city->getValue()
        );
    }

    public function getStreet(): string
    {
        return $this->street->getValue();
    }

    public function getNumber(): string
    {
        return $this->number->getValue();
    }

    public function getDistrict(): string
    {
        return $this->district->getValue();
    }

    public function getZipCode(): string
    {
        return $this->zipCode->getValue();
    }

    public function getCity(): City
    {
        return $this->city;
    }

    public function getComplement(): string|null
    {
        return $this->complement?->getValue();
    }
}

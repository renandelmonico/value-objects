<?php

namespace RenanDelmonico\Vo;

use RenanDelmonico\Vo\CountryEnum;
use RenanDelmonico\Vo\Brazil\StateEnum;

class City implements ValueObjectContract
{
    use ValueObjectBehaviors;

    public function __construct(
        private readonly Str $city,
        private readonly StateEnum $state,
        private readonly CountryEnum $country
    )
    {}

    public function getValue(): string
    {
        return sprintf(
            '%s/%s - %s',
            $this->city->getValue(),
            $this->state->name,
            $this->country->value
        );
    }

    public function getCity(): string
    {
        return $this->city->getValue();
    }

    public function getState(): string
    {
        return $this->state->name;
    }

    public function getCountry(): string
    {
        return $this->country->value;
    }
}

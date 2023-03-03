<?php

namespace RenanDelmonico\Vo;

readonly class City implements ValueObjectContract
{
    use ValueObjectBehaviors;

    /**
     * @param Str $city
     * @param StateEnum $state
     * @param CountryEnum $country
     */
    public function __construct(
        public Str $city,
        public StateEnum $state,
        public CountryEnum $country
    )
    {}

    /**
     * @return string
     */
    public function getValue(): string
    {
        return sprintf(
            '%s/%s - %s',
            $this->city->getValue(),
            $this->state->name,
            $this->country->value
        );
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city->getValue();
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state->name;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country->value;
    }
}

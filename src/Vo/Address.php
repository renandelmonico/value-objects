<?php

namespace RenanDelmonico\Vo;

class Address implements ValueObjectContract
{
    use ValueObjectBehaviors;

    /**
     * @param Str $street
     * @param Str $number
     * @param Str $district
     * @param Str $zipCode
     * @param City $city
     * @param Str|null $complement
     */
    public function __construct(
        public readonly Str $street,
        public readonly Str $number,
        public readonly Str $district,
        public readonly Str $zipCode,
        public readonly City $city,
        public readonly ?Str $complement = null
    )
    {}

    /**
     * @return string
     */
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

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street->getValue();
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number->getValue();
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district->getValue();
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode->getValue();
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getComplement(): string|null
    {
        return $this->complement?->getValue();
    }
}

<?php

namespace RenanDelmonico\Vo;

readonly class Address implements ValueObjectContract
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
        public Str $street,
        public Str $number,
        public Str $district,
        public Str $zipCode,
        public City $city,
        public ?Str $complement = null
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

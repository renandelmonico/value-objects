<?php

namespace Test\Vo;

use RenanDelmonico\Vo\Brazil\StateEnum;
use RenanDelmonico\Vo\City;
use RenanDelmonico\Vo\CountryEnum;
use RenanDelmonico\Vo\Str;
use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\Address;

class AddressTest extends TestCase
{
    public function testShouldInstaceANewAddress()
    {
        $sut = new Address(
            new Str('Rua dos Loucos'),
            new Str(0),
            new Str('Centro'),
            new Str('87020-240'),
            new City(new Str('Maringá'), StateEnum::PR, CountryEnum::BR)
        );

        $this->assertEquals(
            'Rua dos Loucos, 0 - Centro - Maringá/PR - Brazil',
            $sut->getValue()
        );
        $this->assertEquals('Rua dos Loucos', $sut->getStreet());
        $this->assertEquals('0', $sut->getNumber());
        $this->assertEquals('Centro', $sut->getDistrict());
        $this->assertEquals('87020-240', $sut->getZipCode());
        $this->assertEquals('Maringá/PR - Brazil', $sut->getCity()->getValue());
        $this->assertNull($sut->getComplement());
    }

    public function testShouldInstaceANewAddressWithComplement()
    {
        $sut = new Address(
            new Str('Rua dos Loucos'),
            new Str(0),
            new Str('Centro'),
            new Str('87020-240'),
            new City(new Str('Maringá'), StateEnum::PR, CountryEnum::BR),
            new Str('Em cima da padaria')
        );

        $this->assertEquals(
            'Rua dos Loucos, 0 - Em cima da padaria - Centro - Maringá/PR - Brazil',
            $sut->getValue()
        );
        $this->assertEquals('Rua dos Loucos', $sut->getStreet());
        $this->assertEquals('0', $sut->getNumber());
        $this->assertEquals('Centro', $sut->getDistrict());
        $this->assertEquals('87020-240', $sut->getZipCode());
        $this->assertEquals('Maringá/PR - Brazil', $sut->getCity()->getValue());
        $this->assertEquals('Em cima da padaria', $sut->getComplement());
    }
}

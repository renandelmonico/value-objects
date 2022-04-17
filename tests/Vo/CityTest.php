<?php

namespace Test\Vo;

use RenanDelmonico\Vo\City;
use RenanDelmonico\Vo\Str;
use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\CountryEnum;
use RenanDelmonico\Vo\Brazil\StateEnum;

class CityTest extends TestCase
{
    public function testShouldInstanceANewCity()
    {
        $sut = new City(
            new Str('Umuarama'),
            StateEnum::PR,
            CountryEnum::BR
        );

        $this->assertEquals('Umuarama/PR - Brazil', $sut->getValue());
        $this->assertEquals('Umuarama', $sut->getCity());
        $this->assertEquals('PR', $sut->getState());
        $this->assertEquals('Brazil', $sut->getCountry());
    }
}

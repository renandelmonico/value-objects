<?php

namespace Test\Vo;

use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\Address;
use RenanDelmonico\Vo\Boolean;
use RenanDelmonico\Vo\Brazil\StateEnum;
use RenanDelmonico\Vo\City;
use RenanDelmonico\Vo\CountryEnum;
use RenanDelmonico\Vo\Email;
use RenanDelmonico\Vo\Exception\ImmutabilityException;
use RenanDelmonico\Vo\Integer;
use RenanDelmonico\Vo\Numeric;
use RenanDelmonico\Vo\Password;
use RenanDelmonico\Vo\Str;
use RenanDelmonico\Vo\Text;
use RenanDelmonico\Vo\ValueObjectContract;

class ImmutabilityTest extends TestCase
{
    /**
     * @param ValueObjectContract $vo
     * @return void
     *
     * @dataProvider valueObjectsImmutable
     */
    public function testValueObjectImmutable(ValueObjectContract $vo): void
    {
        $this->expectException(exception: ImmutabilityException::class);
        $this->expectExceptionMessage(message: 'SET_IMMUTABLE_STATE');

        $vo->{'newProperty'} = '1234';
    }

    /**
     * @return array
     */
    public function valueObjectsImmutable(): array
    {
        return [
            [
                new Address(
                    street: new Str(value: '25 de maio'),
                    number: new Str(value: '566'),
                    district: new Str(value: 'district'),
                    zipCode: new Str(value: '87485000'),
                    city: new City(city: new Str(value: 'Douradina'), state: StateEnum::PR, country: CountryEnum::BR)
                )
            ],
            [new Boolean(value: true)],
            [new City(city: new Str(value: 'Ji-Paraná'), state: StateEnum::RO, country: CountryEnum::BR)],
            [new Email(value: 'teste@gmail.com')],
            [new Integer(value: 10)],
            [new Numeric(value: 10.5)],
            [new Password(value: 'xyz10')],
            [new Str(value: 'String Immutable')],
            [new Text(value: 'Text Text Text Immutable Immutable')]

        ];
    }
}
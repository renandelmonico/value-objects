<?php

namespace Test\Vo;

use RenanDelmonico\Vo\Boolean;
use RenanDelmonico\Vo\Integer;
use RenanDelmonico\Vo\ValueObjectContract;
use PHPUnit\Framework\TestCase;

class BooleanTest extends TestCase
{
    /**
     * @dataProvider boolDataProvider
     */
    public function testShouldInstaceAndReturnBooleanValue(bool $value)
    {
        $sut = new Boolean($value);

        $this->assertEquals($value, $sut->getValue());
        $this->assertIsBool($sut->getValue());
        $this->assertEquals($value, $sut->value);
        $this->assertIsBool($sut->value);
    }

    public function boolDataProvider(): array
    {
        return [
            [true],
            [false]
        ];
    }

    /**
     * @dataProvider equalsDataProvider
     */
    public function testShouldVerifyIfValueIsEquals(
        Boolean $firstValue,
        ValueObjectContract $secondValue,
        bool $result
    ) {
        $this->assertEquals($result, $firstValue->eq($secondValue));
    }

    public function equalsDataProvider(): array
    {
        return [
            [new Boolean(true), new Integer(1), false],
            [new Boolean(true), new Boolean(true), true],
            [new Boolean(false), new Boolean(false), true],
            [new Boolean(false), new Boolean(true), false]
        ];
    }

    /**
     * @dataProvider isTrueDataProvider
     */
    public function testShouldVerifyIfIsTrue(Boolean $value, bool $isTrue)
    {
        $this->assertEquals($isTrue, $value->isTrue());
    }

    public function isTrueDataProvider(): array
    {
        return [
            [new Boolean(true), true],
            [new Boolean(false), false]
        ];
    }

    /**
     * @dataProvider isFalseDataProvider
     */
    public function testShouldVerifyIfIsFalse(Boolean $value, bool $isTrue)
    {
        $this->assertEquals($isTrue, $value->isFalse());
    }

    public function isFalseDataProvider(): array
    {
        return [
            [new Boolean(true), false],
            [new Boolean(false), true]
        ];
    }
}

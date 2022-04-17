<?php

namespace Test\Vo;

use RenanDelmonico\Vo\Integer;
use RenanDelmonico\Vo\Math;
use RenanDelmonico\Vo\Numeric;
use PHPUnit\Framework\TestCase;

class IntegerTest extends TestCase
{
    /**
     * @dataProvider integerDataProvider
     */
    public function testShouldInstaceAndReturnIntegerValue(float $value)
    {
        $sut = new Integer($value);

        $this->assertEquals($value, $sut->getValue());
        $this->assertIsInt($sut->getValue());
        $this->assertEquals($value, $sut->value);
        $this->assertIsInt($sut->value);
    }

    public function integerDataProvider(): array
    {
        return [
            [1],
            [5],
            [0],
            [-1]
        ];
    }

    /**
     * @dataProvider sumDataProvider
     */
    public function testShouldSumIntValue(
        Integer $rawValue,
        Math $sumValue,
        Math $expectedValue,
        string $instance
    ) {
        $value = $rawValue->sum($sumValue);

        $this->assertEquals($expectedValue->getValue(), $value->getValue());
        $this->assertInstanceOf($instance, $value);
    }

    public function sumDataProvider()
    {
        return [
            [new Integer(1), new Integer(0), new Integer(1), Integer::class],
            [new Integer(1), new Integer(1), new Integer(2), Integer::class],
            [new Integer(-1), new Integer(1), new Integer(0), Integer::class],
            [new Integer(1), new Numeric(0.5), new Numeric(1.5), Numeric::class],
            [new Integer(1), new Numeric(1), new Numeric(2), Numeric::class]
        ];
    }

    /**
     * @dataProvider minusDataProvider
     */
    public function testShouldMinusIntValue(
        Integer $rawValue,
        Math $minus,
        Math $expectedValue
    ) {
        $value = $rawValue->minus($minus);

        $this->assertEquals($expectedValue->getValue(), $value->getValue());
    }

    public function minusDataProvider(): array
    {
        return [
            [new Integer(10), new Integer(3), new Integer(7)],
            [new Integer(-2), new Integer(1), new Integer(-3)],
            [new Integer(10), new Numeric(0.5), new Numeric(9.5)]
        ];
    }

    /**
     * @dataProvider divDataProvider
     */
    public function testShouldDivIntValue(
        Integer $rawValue,
        Math $div,
        Math $expectedValue
    ) {
        $value = $rawValue->div($div);

        $this->assertEquals($expectedValue->getValue(), $value->getValue());
    }

    public function divDataProvider(): array
    {
        return [
            [new Integer(10), new Integer(2), new Integer(5)],
            [new Integer(-10), new Integer(2), new Integer(-5)],
            [new Integer(10), new Numeric(0.4), new Numeric(25)],
            [new Integer(10), new Numeric(-0.4), new Numeric(-25)]
        ];
    }

    /**
     * @dataProvider multiDataProvider
     */
    public function testShouldMultiIntValue(
        Integer $rawValue,
        Math $product,
        Math $expectedValue
    ) {
        $value = $rawValue->multi($product);

        $this->assertEquals($expectedValue->getValue(), $value->getValue());
    }

    public function multiDataProvider(): array
    {
        return [
            [new Integer(-3), new Integer(3), new Integer(-9)],
            [new Integer(-3), new Integer(-1), new Integer(3)],
            [new Integer(2), new Numeric(1.5), new Numeric(3)]
        ];
    }

    /**
     * @dataProvider equalsDataProvider
     */
    public function testShouldVerifyIfValueIsEquals(
        Integer $firstValue,
        Integer $secondValue,
        bool $result
    ) {
        $this->assertEquals($result, $firstValue->eq($secondValue));
    }

    public function equalsDataProvider(): array
    {
        return [
            [new Integer(1), new Integer(1), true],
            [new Integer(0), new Integer(0), true],
            [new Integer(1), new Integer(0), false]
        ];
    }

    /**
     * @dataProvider gteDataProvider
     */
    public function testShouldVerifyIfValueIsGreaterThanOrEqual(
        Integer $firstValue,
        Math $secondValue,
        bool $result
    ) {
        $this->assertEquals($result, $firstValue->gte($secondValue));
    }

    public function gteDataProvider(): array
    {
        return [
            [new Integer(1), new Integer(1), true],
            [new Integer(2), new Integer(1), true],
            [new Integer(0), new Integer(1), false],
            [new Integer(1), new Numeric(1.0000000001), false],
            [new Integer(1), new Numeric(0.9999999999), true],
            [new Integer(-10), new Integer(-11), true]
        ];
    }

    /**
     * @dataProvider gtDataProvider
     */
    public function testShouldVerifyIfValueIsGreaterThan(
        Integer $firstValue,
        Math $secondValue,
        bool $result
    ) {
        $this->assertEquals($result, $firstValue->gt($secondValue));
    }

    public function gtDataProvider(): array
    {
        return [
            [new Integer(1), new Integer(1), false],
            [new Integer(2), new Integer(1), true],
            [new Integer(0), new Integer(1), false],
            [new Integer(1), new Numeric(1.0000000001), false],
            [new Integer(1), new Numeric(0.9999999999), true],
            [new Integer(-10), new Integer(-11), true]
        ];
    }

    /**
     * @dataProvider lteDataProvider
     */
    public function testShouldVerifyIfValueIsLessThanOrEqual(
        Integer $firstValue,
        Math $secondValue,
        bool $result
    ) {
        $this->assertEquals($result, $firstValue->lte($secondValue));
    }

    public function lteDataProvider(): array
    {
        return [
            [new Integer(1), new Integer(1), true],
            [new Integer(2), new Integer(1), false],
            [new Integer(0), new Integer(1), true],
            [new Integer(1), new Numeric(1.0000000001), true],
            [new Integer(1), new Numeric(0.9999999999), false],
            [new Integer(-10), new Integer(-11), false]
        ];
    }

    /**
     * @dataProvider ltDataProvider
     */
    public function testShouldVerifyIfValueIsLessThan(
        Integer $firstValue,
        Math $secondValue,
        bool $result
    ) {
        $this->assertEquals($result, $firstValue->lt($secondValue));
    }

    public function ltDataProvider(): array
    {
        return [
            [new Integer(1), new Integer(1), false],
            [new Integer(2), new Integer(1), false],
            [new Integer(0), new Integer(1), true],
            [new Integer(1), new Numeric(1.0000000001), true],
            [new Integer(1), new Numeric(0.9999999999), false],
            [new Integer(-10), new Integer(-11), false]
        ];
    }
}

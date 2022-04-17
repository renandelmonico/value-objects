<?php

namespace Test\Vo;

use RenanDelmonico\Vo\Numeric;
use PHPUnit\Framework\TestCase;

class NumericTest extends TestCase
{
    /**
     * @dataProvider numericDataProvider
     */
    public function testShouldInstaceAndReturnNumericValue(float $value)
    {
        $sut = new Numeric($value);

        $this->assertEquals($value, $sut->getValue());
        $this->assertIsFloat($sut->getValue());
        $this->assertEquals($value, $sut->value);
        $this->assertIsFloat($sut->value);
    }

    public function numericDataProvider(): array
    {
        return [
            [1.5],
            [5],
            [1.333333333333333],
            [0],
            [0.00000000000001],
            [-1.33333333333345]
        ];
    }

    /**
     * @dataProvider sumDataProvider
     */
    public function testShouldSumNumericValue(
        float $rawValue,
        float $sumValue,
        float $expectedValue
    ) {
        $sut = new Numeric($rawValue);

        $value = $sut->sum(new Numeric($sumValue));

        $this->assertEquals($expectedValue, $value->getValue());
    }

    public function sumDataProvider()
    {
        return [
            [1.5, 1, 2.5],
            [-1, -1.5, -2.5],
            [5, 5, 10],
            [5, -5, 0]
        ];
    }

    /**
     * @dataProvider minusDataProvider
     */
    public function testShouldMinusNumericValue(
        float $rawValue,
        float $minus,
        float $expectedValue
    ) {
        $sut = new Numeric($rawValue);

        $value = $sut->minus(new Numeric($minus));

        $this->assertEquals($expectedValue, $value->getValue());
    }

    public function minusDataProvider(): array
    {
        return [
            [1.5, 0.5, 1],
            [2, 1, 1],
            [-1, -1, 0],
            [-10, -1, -9]
        ];
    }

    /**
     * @dataProvider divDataProvider
     */
    public function testShouldDivNumericValue(
        float $rawValue,
        float $div,
        float $expectedValue
    ) {
        $sut = new Numeric($rawValue);

        $value = $sut->div(new Numeric($div));

        $this->assertEquals($expectedValue, $value->getValue());
    }

    public function divDataProvider(): array
    {
        return [
            [10, 2, 5],
            [-10, 2, -5],
            [10, 0.4, 25],
            [10, -0.4, -25]
        ];
    }

    /**
     * @dataProvider multiDataProvider
     */
    public function testShouldMultiNumericValue(
        float $rawValue,
        float $product,
        float $expectedValue
    ) {
        $sut = new Numeric($rawValue);

        $value = $sut->multi(new Numeric($product));

        $this->assertEquals($expectedValue, $value->getValue());
    }

    public function multiDataProvider(): array
    {
        return [
            [2.5, 2, 5],
            [2.5, 1, 2.5],
            [-3, 3, -9],
            [-3, -1, 3],
            [2, 1.5, 3]
        ];
    }

    /**
     * @dataProvider roundDataProvider
     */
    public function testShouldRoundValue(
        float $rawValue,
        int $precision,
        int $mode,
        float $expectedValue
    ) {
        $sut = new Numeric($rawValue);

        $value = $sut->round($precision, $mode);

        $this->assertEquals($expectedValue, $value->getValue());
    }

    public function roundDataProvider(): array
    {
        return [
            [1.3333333, 2, PHP_ROUND_HALF_UP, 1.33],
            [1.5, 0, PHP_ROUND_HALF_UP, 2],
            [1.5, 0, PHP_ROUND_HALF_DOWN, 1],
            [1.5, 0, PHP_ROUND_HALF_EVEN, 2],
            [2.5, 0, PHP_ROUND_HALF_EVEN, 2],
            [1.5, 0, PHP_ROUND_HALF_ODD, 1],
            [2.5, 0, PHP_ROUND_HALF_ODD, 3]
        ];
    }

    /**
     * @dataProvider equalsDataProvider
     */
    public function testShouldVerifyIfValueIsEquals(
        float $fisrtValue,
        float $secondValue,
        bool $result
    ) {
        $sut = new Numeric($fisrtValue);

        $this->assertEquals($result, $sut->eq(new Numeric($secondValue)));
    }

    public function equalsDataProvider(): array
    {
        return [
            [1.33333333, 1.33333333, true],
            [1.33333333, 1.3333333, false],
            [1.000000000001, 1.000000000001, true],
            [1.000000000001, 1.00000000001, false],
            [1.000000000001, 1, false],
            [1, 1, true],
            [0, 0, true]
        ];
    }

    /**
     * @dataProvider gteDataProvider
     */
    public function testShouldVerifyIfValueIsGreaterThanOrEqual(
        float $firstValue,
        float $secondValue,
        bool $result
    ) {
        $sut = new Numeric($firstValue);

        $this->assertEquals($result, $sut->gte(new Numeric($secondValue)));
    }

    public function gteDataProvider(): array
    {
        return [
            [1.5, 1.5, true],
            [1.5, 1.6, false],
            [1.5, 1.4, true],
            [1.555555555555, 1.555555555555, true],
            [1.555555555555, 1.555555555556, false],
            [1.555555555555, 1.555555555554, true],
            [-1.555555555555, -1.555555555555, true],
            [-1.555555555555, -1.555555555556, true],
            [-1.555555555555, -1.555555555554, false],
        ];
    }

    /**
     * @dataProvider gtDataProvider
     */
    public function testShouldVerifyIfValueIsGreaterThan(
        float $firstValue,
        float $secondValue,
        bool $result
    ) {
        $sut = new Numeric($firstValue);

        $this->assertEquals($result, $sut->gt(new Numeric($secondValue)));
    }

    public function gtDataProvider(): array
    {
        return [
            [1.5, 1.5, false],
            [1.5, 1.6, false],
            [1.5, 1.4, true],
            [1.555555555555, 1.555555555555, false],
            [1.555555555555, 1.555555555556, false],
            [1.555555555555, 1.555555555554, true],
            [-1.555555555555, -1.555555555555, false],
            [-1.555555555555, -1.555555555556, true],
            [-1.555555555555, -1.555555555554, false],
        ];
    }

    /**
     * @dataProvider lteDataProvider
     */
    public function testShouldVerifyIfValueIsLessThanOrEqual(
        float $firstValue,
        float $secondValue,
        bool $result
    ) {
        $sut = new Numeric($firstValue);

        $this->assertEquals($result, $sut->lte(new Numeric($secondValue)));
    }

    public function lteDataProvider(): array
    {
        return [
            [1.5, 1.5, true],
            [1.5, 1.6, true],
            [1.5, 1.4, false],
            [1.555555555555, 1.555555555555, true],
            [1.555555555555, 1.555555555556, true],
            [1.555555555555, 1.555555555554, false],
            [-1.555555555555, -1.555555555555, true],
            [-1.555555555555, -1.555555555556, false],
            [-1.555555555555, -1.555555555554, true],
        ];
    }

    /**
     * @dataProvider ltDataProvider
     */
    public function testShouldVerifyIfValueIsLessThan(
        float $firstValue,
        float $secondValue,
        bool $result
    ) {
        $sut = new Numeric($firstValue);

        $this->assertEquals($result, $sut->lt(new Numeric($secondValue)));
    }

    public function ltDataProvider(): array
    {
        return [
            [1.5, 1.5, false],
            [1.5, 1.6, true],
            [1.5, 1.4, false],
            [1.555555555555, 1.555555555555, false],
            [1.555555555555, 1.555555555556, true],
            [1.555555555555, 1.555555555554, false],
            [-1.555555555555, -1.555555555555, false],
            [-1.555555555555, -1.555555555556, false],
            [-1.555555555555, -1.555555555554, true],
        ];
    }
}

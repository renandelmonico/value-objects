<?php

namespace Test\Vo;

use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\DateTime;
use RenanDelmonico\Vo\InvalidVoException;

class DateTimeTest extends TestCase
{
    public function testShouldInstaceANewDateTimeInstance()
    {
        $sut = new DateTime('2023-02-03T04:05:06+00:00');

        $this->assertEquals('2023-02-03 04:05:06', $sut->getValue()->format('Y-m-d H:i:s'));
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function testWithInvalidValueShouldThrowAnException()
    {
        $value = '2023-31-31T04:05:06+00:00';

        $this->expectException(InvalidVoException::class);
        $this->expectExceptionMessage(sprintf(
            'Invalid value for type %s. Value: \'%s\'',
            DateTime::class,
            $value
        ));

        new DateTime($value);
    }

    public function invalidDataProvider(): array
    {
        return [
            ['2023-31-31T04:05:06+00:00'],
            ['xpto'],
            [''],
            ['12/01/2023'],
        ];
    }
}

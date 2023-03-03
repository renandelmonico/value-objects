<?php

namespace Test\Vo;

use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\InvalidVoException;
use RenanDelmonico\Vo\IPv4;

class IPv4Test extends TestCase
{
    public function testShouldInstanceANewIPv4()
    {
        $sut = new IPv4('192.168.0.1');

        $this->assertEquals('192.168.0.1', $sut->getValue());
    }

    /**
     * @dataProvider invalidIPv4DataProvider
     */
    public function testShouldThrowErrorToInvalidIPv4(string $ipv4)
    {
        $this->expectException(InvalidVoException::class);
        $this->expectExceptionMessage(sprintf(
            'Invalid value for type %s. Value: \'%s\'',
            IPv4::class,
            $ipv4
        ));

        new IPv4($ipv4);
    }

    public function invalidIPv4DataProvider(): array
    {
        return [
            ['xpto'],
            ['19216801'],
            ['256.256.256.256'],
            ['0.0.0.256'],
            ['2001:0db8:85a3:0000:0000:8a2e:0370:7334']
        ];
    }
}

<?php

namespace Test\Vo;

use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\InvalidVoException;
use RenanDelmonico\Vo\IPv6;

class IPv6Test extends TestCase
{
    public function testShouldInstanceANewIPv6()
    {
        $sut = new IPv6('2001:0db8:85a3:0000:0000:8a2e:0370:7334');

        $this->assertEquals('2001:0db8:85a3:0000:0000:8a2e:0370:7334', $sut->getValue());
    }

    /**
     * @dataProvider invalidIPv6DataProvider
     */
    public function testShouldThrowErrorToInvalidIPv6(string $ipv6)
    {
        $this->expectException(InvalidVoException::class);
        $this->expectExceptionMessage(sprintf(
            'Invalid value for type %s. Value: \'%s\'',
            IPv6::class,
            $ipv6
        ));

        new IPv6($ipv6);
    }

    public function invalidIPv6DataProvider(): array
    {
        return [
            ['xpto'],
            ['19216801'],
            ['256.256.256.256'],
            ['0.0.0.0'],
            ['192.168.0.1']
        ];
    }
}

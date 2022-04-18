<?php

namespace Test\Vo;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid as UuidGenerator;
use RenanDelmonico\Vo\InvalidVoException;
use RenanDelmonico\Vo\UUID;

class UUIDTest extends TestCase
{
    public function testShouldInstanceANewUUIDWithNoParamInConstructor()
    {
        $sut = new UUID();

        $this->assertTrue(UuidGenerator::isValid($sut->getValue()));
    }

    public function testShouldInstanceANewUUIDWithParamInConstructor()
    {
        $uuid = '47b7d205-3456-4a45-9288-4c7e81fd68a2';
        $sut = new UUID($uuid);

        $this->assertEquals($uuid, $sut->getValue());
    }

    public function testShouldThrowAnExceptionOnTryCreateWithInvalidUUID()
    {
        $this->expectException(InvalidVoException::class);
        $this->expectErrorMessage(sprintf(
            'Invalid value for type %s. Value: \'%s\'',
            UUID::class,
            'invalid_uuid'
        ));

        new UUID('invalid_uuid');
    }
}

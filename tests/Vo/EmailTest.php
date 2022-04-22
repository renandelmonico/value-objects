<?php

namespace Test\Vo;

use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\Email;
use RenanDelmonico\Vo\Exception\InvalidVoException;

class EmailTest extends TestCase
{
    public function testShouldInstanceANewEmail()
    {
        $sut = new Email('teste@teste.com');

        $this->assertEquals('teste@teste.com', $sut->getValue());
    }

    public function testShouldThrowAnExceptionToInvalidEmail()
    {
        $this->expectException(InvalidVoException::class);
        $this->expectExceptionMessage(sprintf(
            'Invalid value for type %s. Value: \'%s\'',
            Email::class,
            'invalid_email@teste.com '
        ));

        new Email('invalid_email@teste.com ');
    }
}

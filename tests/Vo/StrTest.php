<?php

namespace Test\Vo;

use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\Exception\InvalidVoException;
use RenanDelmonico\Vo\Exception\TooLongValueException;
use RenanDelmonico\Vo\Integer;
use RenanDelmonico\Vo\Str;

class StrTest extends TestCase
{
    public function testShouldReturnAValidString()
    {
        $sut = new Str('valid string');

        $this->assertEquals('valid string', $sut->getValue());
    }

    /**
     * @dataProvider areEqualsDataProvider
     */
    public function testShouldVerifyIfTwoStringsAreEquals(
        Str $firstString,
        Str $secondString,
        bool $areEquals
    ) {
        $this->assertEquals($areEquals, $firstString->eq($secondString));
    }

    public function areEqualsDataProvider(): array
    {
        return [
            [new Str('same string'), new Str('same string'), true],
            [new Str('different string'), new Str('different string '), false],
            [new Str('first string'), new Str('second string'), false]
        ];
    }

    public function testShouldReturnFalseToEqualsVerification()
    {
        $sut = new Str('1');

        $this->assertFalse($sut->eq(new Integer(1)));
    }

    public function testTooLongStringShouldThrowException()
    {
        $exceptionMessage = sprintf(
            'Invalid value for type %s. Value: %s',
            Str::class,
            'xpto'
        );

        $this->expectException(TooLongValueException::class);
        $this->expectExceptionMessage($exceptionMessage);

        new Str('xpto', 2);
    }

    public function testTooLongStringWithDefaultLengthShouldThrowException()
    {
        $string = 'abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz';
        $string .= 'abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz';
        $string .= 'abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz';
        $string .= 'abcdefghijklmnop';

        $exceptionMessage = sprintf(
            'Invalid value for type %s. Value: %s',
            Str::class,
            $string
        );

        $this->expectException(TooLongValueException::class);
        $this->expectExceptionMessage($exceptionMessage);

        new Str($string);
    }

    public function testStringWithDefaultLengthShouldPass()
    {
        $string = 'abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz';
        $string .= 'abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz';
        $string .= 'abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz abcdefghijklmnopqrstuvwxyz';
        $string .= 'abcdefghijklmno';

        $sut = new Str($string);

        $this->assertStringContainsString('abcdefghijklmnopqrstuvwxyz', $sut->getValue());
    }

    public function testEmptyStringShouldThrowException()
    {
        $exceptionMessage = sprintf(
            'Invalid value for type %s. Value: \'\'',
            Str::class
        );

        $this->expectException(InvalidVoException::class);
        $this->expectExceptionMessage($exceptionMessage);

        new Str('');
    }

    public function testEmptyStringShouldntThrowException()
    {
        $sut = new Str(value: '', allowEmpty: true);

        $this->assertEmpty($sut->getValue());
    }
}

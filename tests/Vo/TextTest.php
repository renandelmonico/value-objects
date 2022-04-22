<?php

namespace Test\Vo;

use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\Exception\InvalidVoException;
use RenanDelmonico\Vo\Integer;
use RenanDelmonico\Vo\Str;
use RenanDelmonico\Vo\Text;
use RenanDelmonico\Vo\ValueObjectContract;

class TextTest extends TestCase
{
    public function testShouldReturnAValidString()
    {
        $sut = new Text('valid string');

        $this->assertEquals('valid string', $sut->getValue());
    }

    /**
     * @dataProvider areEqualsDataProvider
     */
    public function testShouldVerifyIfTwoStringsAreEquals(
        Text $firstString,
        ValueObjectContract $secondString,
        bool $areEquals
    ) {
        $this->assertEquals($areEquals, $firstString->eq($secondString));
    }

    public function areEqualsDataProvider(): array
    {
        return [
            [new Text('same string'), new Text('same string'), true],
            [new Text('same string'), new Str('same string'), true],
            [new Text('different string'), new Str('different string '), false],
            [new Text('first string'), new Str('second string'), false]
        ];
    }

    public function testShouldReturnFalseToEqualsVerification()
    {
        $sut = new Text('1');

        $this->assertFalse($sut->eq(new Integer(1)));
    }

    public function testEmptyStringShouldThrowException()
    {
        $exceptionMessage = sprintf(
            'Invalid value for type %s. Value: \'\'',
            Text::class
        );

        $this->expectException(InvalidVoException::class);
        $this->expectExceptionMessage($exceptionMessage);

        new Text('');
    }

    public function testEmptyStringShouldntThrowException()
    {
        $sut = new Text(value: '', allowEmpty: true);

        $this->assertEmpty($sut->getValue());
    }
}

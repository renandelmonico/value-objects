<?php

namespace Test\Vo;


use PHPUnit\Framework\TestCase;
use RenanDelmonico\Vo\Text;
use RenanDelmonico\Vo\TextImmutable;

class ImmutabilityTest extends TestCase
{
    /**
     * Neste cenário de teste estou comparando se objetos não são iguais isso afirma que o objeto de valor(VO) é mutável.
     */
    public function testFailImmutableObjectExample(): void
    {
        $example = new Text(value: 'text example');
        $example->{'newProperty'} = '1234';

        static::assertNotEquals(expected: new Text('text example'), actual: $example);
    }

    /**
     * Já nesse assert deixei implementado o cenário que seria mais favorável, que não estariámos deixando
     * o objeto de valor ser modificado
     */
    public function testSuccessImmutableObject(): void
    {
        $this->expectExceptionMessage(message: 'SET_IMMUTABLE_STATE');

        $textImmutable = new TextImmutable(value: 'text example');
        $textImmutable->{'newProperty'} = '1234';
    }
}
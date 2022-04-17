<?php

namespace Test\Vo;

use RenanDelmonico\Vo\InvalidVoException;
use RenanDelmonico\Vo\Password;
use RenanDelmonico\Vo\PasswordAlgoEnum;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    /**
     * @dataProvider validPasswordDataProvider
     */
    public function testShouldInstanceANewPassword(string $password)
    {
        $sut = new Password($password);

        $this->assertNotEquals($password, $sut->getValue());
        $this->assertNotNull($sut->getValue());
    }

    public function validPasswordDataProvider(): array
    {
        return [
            ['abc123'],
            ['a']
        ];
    }

    /**
     * @dataProvider algoDataProvider
     */
    public function testShouldGenerateHashWithCorrectAlgo(
        PasswordAlgoEnum $algo
    ) {
        $sut = new Password('abc123', $algo);

        $this->assertEquals($algo, $sut->getAlgo());
    }

    public function algoDataProvider(): array
    {
        return [
            [PasswordAlgoEnum::ARGON2I],
            [PasswordAlgoEnum::ARGON2ID],
            [PasswordAlgoEnum::BCRYPT]
        ];
    }

    /**
     * @dataProvider passwordsDataProvider
     */
    public function testShouldVerifyIfPasswordIsValid(
        string $newPasswordToVerify,
        bool $isValid
    )
    {
        $sut = new Password('abc123');

        $this->assertEquals($isValid, $sut->isValid($newPasswordToVerify));
    }

    public function passwordsDataProvider(): array
    {
        return [
            ['abc123', true],
            [' abc123', false],
            ['xpto', false],
            ['ABC123', false]
        ];
    }

    public function testShouldThrowAnExceptionToSmallPassword()
    {
        $this->expectException(InvalidVoException::class);
        $this->expectExceptionMessage(sprintf(
            'Invalid value for type %s.',
            Password::class
        ));

        new Password('', PasswordAlgoEnum::ARGON2I);
    }
}

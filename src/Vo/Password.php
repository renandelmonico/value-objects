<?php

namespace RenanDelmonico\Vo;

class Password implements ValueObjectContract
{
    use ValueObjectBehaviors;

    private readonly string $value;

    public function __construct(
        string $value,
        PasswordAlgoEnum $algo = PasswordAlgoEnum::ARGON2ID,
        int $minChars = 1,
        array $options = []
    ) {
        if (!$this->validate($value, $minChars)) {
            throw new InvalidVoException(sprintf(
                'Invalid value for type %s.',
                self::class
            ));
        }

        $this->value = password_hash($value, $algo->value, $options);
    }

    private function validate(string $password, int $minChars): bool
    {
        $isValid = strlen($password) >= $minChars;

        if (!$isValid) {
            return false;
        }

        return true;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isValid(string $password): bool
    {
        return password_verify($password, $this->getValue());
    }

    public function getAlgo(): PasswordAlgoEnum
    {
        $algo = password_get_info($this->getValue())['algo'];

        return PasswordAlgoEnum::from($algo);
    }
}

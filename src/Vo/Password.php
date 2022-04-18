<?php

namespace RenanDelmonico\Vo;

class Password implements ValueObjectContract
{
    use ValueObjectBehaviors;

    private readonly string $value;

    /**
     * @param string $value
     * @param PasswordAlgoEnum $algo
     * @param integer $minChars
     * @param array $options
     * @throws InvalidVoException
     */
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

    /**
     * @param string $password
     * @param integer $minChars
     * @return boolean
     */
    private function validate(string $password, int $minChars): bool
    {
        $isValid = strlen($password) >= $minChars;

        if (!$isValid) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $password
     * @return boolean
     */
    public function isValid(string $password): bool
    {
        return password_verify($password, $this->getValue());
    }

    /**
     * @return PasswordAlgoEnum
     */
    public function getAlgo(): PasswordAlgoEnum
    {
        $algo = password_get_info($this->getValue())['algo'];

        return PasswordAlgoEnum::from($algo);
    }
}

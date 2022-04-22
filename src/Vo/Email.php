<?php

namespace RenanDelmonico\Vo;

use RenanDelmonico\Vo\Exception\InvalidVoException;

class Email implements ValueObjectContract
{
    use ValueObjectBehaviors;

    private readonly string $value;

    /**
     * @param string $value
     * @throws InvalidVoException
     */
    public function __construct(string $value)
    {
        if (!$this->validate($value)) {
            throw new InvalidVoException(sprintf(
                'Invalid value for type %s. Value: \'%s\'',
                self::class,
                $value
            ));
        }

        $this->value = $value;
    }

    /**
     * @param string $email
     * @return boolean
     */
    private function validate(string $email): bool
    {
        $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);

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
}

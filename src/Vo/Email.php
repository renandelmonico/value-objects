<?php

namespace RenanDelmonico\Vo;

readonly class Email implements ValueObjectContract
{
    use ValueObjectBehaviors;

    public string $value;

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

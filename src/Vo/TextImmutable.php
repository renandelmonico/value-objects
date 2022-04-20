<?php

namespace RenanDelmonico\Vo;

class TextImmutable implements ValueObjectContractImmutable
{
    use Immutability, ValueObjectBehaviors;

    public readonly string $value;

    /**
     * @param string $value
     * @param boolean $allowEmpty
     * @throws InvalidVoException
     */
    public function __construct(string $value, bool $allowEmpty = false)
    {
        if (!$this->validate(value: $value, allowEmpty: $allowEmpty)) {
            throw new InvalidVoException(sprintf(
                'Invalid value for type %s. Value: \'%s\'',
                self::class,
                $value
            ));
        }

        $this->value = $value;
    }

    /**
     * @param string $value
     * @param boolean $allowEmpty
     * @return boolean
     */
    private function validate(string $value, bool $allowEmpty): bool
    {
        return !(!$allowEmpty && $value === '');
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
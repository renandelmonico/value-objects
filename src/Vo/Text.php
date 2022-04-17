<?php

namespace RenanDelmonico\Vo;

class Text implements ValueObjectContract
{
    use ValueObjectBehaviors;

    public readonly string $value;

    public function __construct(string $value, bool $allowEmpty = false)
    {
        if (!$this->validate($value, $allowEmpty)) {
            throw new InvalidVoException(sprintf(
                'Invalid value for type %s. Value: \'%s\'',
                self::class,
                $value
            ));
        }

        $this->value = $value;
    }

    private function validate(string $value, bool $allowEmpty): bool
    {
        if (!$allowEmpty && strlen($value) === 0) {
            return false;
        }

        return true;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

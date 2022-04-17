<?php

namespace RenanDelmonico\Vo;

class Str implements ValueObjectContract
{
    use ValueObjectBehaviors;

    public readonly string $value;

    public function __construct(string $value, int $length = 255, bool $allowEmpty = false)
    {
        if (!$this->validate($value, $length, $allowEmpty)) {
            throw new InvalidVoException(sprintf(
                'Invalid value for type %s. Value: \'%s\'',
                self::class,
                $value
            ));
        }

        $this->value = $value;
    }

    private function validate(string $value, int $length, bool $allowEmpty): bool
    {
        if (strlen($value) > $length) {
            throw new TooLongValueException(sprintf(
                'Invalid value for type %s. Value: %s',
                self::class,
                $value
            ));
        }

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

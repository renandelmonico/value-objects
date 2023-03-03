<?php

namespace RenanDelmonico\Vo;

use DateTime as GlobalDateTime;
use DateTimeInterface;
use Exception;

readonly class DateTime implements ValueObjectContract
{
    use ValueObjectBehaviors;

    public DateTimeInterface $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        try {
            $this->value = new GlobalDateTime($value);
        } catch (Exception) {
            throw new InvalidVoException(sprintf(
                'Invalid value for type %s. Value: \'%s\'',
                get_class($this),
                $value
            ));
        }
    }

    /**
     * @return DateTimeInterface
     */
    public function getValue(): DateTimeInterface
    {
        return $this->value;
    }
}

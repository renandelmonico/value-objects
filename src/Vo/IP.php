<?php

namespace RenanDelmonico\Vo;

readonly abstract class IP implements ValueObjectContract
{
    use ValueObjectBehaviors;

    public string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (!$this->validate($value)) {
            throw new InvalidVoException(sprintf(
                'Invalid value for type %s. Value: \'%s\'',
                get_class($this),
                $value
            ));
        }

        $this->value = $value;
    }

    /**
     * @param string $value
     * @return boolean
     */
    protected abstract function validate(string $value): bool;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}

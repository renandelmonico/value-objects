<?php

namespace RenanDelmonico\Vo;

use Ramsey\Uuid\Uuid as UuidGenerator;
use Ramsey\Uuid\UuidInterface;

class UUID implements ValueObjectContract
{
    use ValueObjectBehaviors;

    public readonly UuidInterface $value;

    /**
     * @param string|null $value
     * @throws InvalidVoException
     */
    public function __construct(string $value = null)
    {
        if (!$this->validate($value)) {
            throw new InvalidVoException(sprintf(
                'Invalid value for type %s. Value: \'%s\'',
                self::class,
                $value
            ));
        }

        $this->generateValue($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value->toString();
    }

    /**
     * @param string|null $uuid
     * @return boolean
     */
    private function validate(string $uuid = null): bool
    {
        if (!$uuid) {
            return true;
        }

        return UuidGenerator::isValid($uuid);
    }

    /**
     * @param string|null $value
     * @return void
     */
    private function generateValue(string $value = null): void
    {
        if ($value) {
            $this->value = UuidGenerator::fromString($value);

            return;
        }

        $this->value = UuidGenerator::uuid4();
    }
}

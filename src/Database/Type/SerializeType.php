<?php

namespace App\Database\Type;

use Cake\Database\DriverInterface;
use Cake\Database\Type;
use Cake\Database\TypeInterface;
use PDO;

class SerializeType extends Type implements TypeInterface
{
    /**
     * Serializuj $value przed zapisaniem do bazy
     */
    public function toDatabase($value, DriverInterface $driver) : ?string
    {
        if ($value === null || is_string($value)) {
            return $value;
        }

        return serialize($value);
    }

    /**
     * Deserializuj wartość przed pobraniem z bazy
     *
     * @return string|null|array
     */
    public function toPHP($value, DriverInterface $driver)
    {
        if ($value === null) {
            return $value;
        }

        return unserialize($value);
    }

    /**
     * Pobierz poprawny binding PDO
     */
    public function toStatement($value, DriverInterface $driver) : int
    {
        if ($value === null) {
            return PDO::PARAM_NULL;
        }

        return PDO::PARAM_LOB;
    }

    /**
     * Konwertuj dane z requestu
     *
     * @return mixed
     */
    public function marshal($value)
    {
        return $value;
    }

    public function getBaseType(): ?string
    {
        return $this->_name;
    }

    public function getName(): ?string
    {
        return $this->_name;
    }

    /**
     * Należy zaimplementować, jeśli typ ma tworzyć primary_key
     * (np. typ uuid powinien tutaj generować uuid)
     */
    public function newId()
    {
        return null;
    }
}

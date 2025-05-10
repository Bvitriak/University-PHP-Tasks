<?php

namespace src\Models;

use src\Services\Database;
use ReflectionObject;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value): void
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $setterName = 'set' . ucfirst($camelCaseName);

        if (method_exists($this, $setterName)) {
            $this->$setterName($value);
        } else {
            $this->$camelCaseName = $value;
        }
    }

    private function underscoreToCamelCase(string $name): string
    {
        return lcfirst(str_replace('_', '', ucwords($name, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/([A-Z])/', '_$1', $source));
    }

    private function mapPropertiesToDb(): array
    {
        $reflector = new ReflectionObject($this);
        $properties = $reflector->getProperties();
        $mappedProperties = [];

        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyDbName = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyDbName] = $this->$propertyName;
        }

        return $mappedProperties;
    }

    public static function findAll(): array
    {
        $db = Database::getInstance();
        $sql = 'SELECT * FROM ' . static::getTableName();

        return $db->query($sql, [], static::class);
    }

    public static function getById(int $id): ?static
    {
        $db = Database::getInstance();
        $sql = 'SELECT * FROM ' . static::getTableName() . ' WHERE id = :id';
        $result = $db->query($sql, [':id' => $id], static::class);

        return $result ? $result[0] : null;
    }

    public function save(): void
    {
        $this->id ? $this->update() : $this->insert();
    }

    private function update(): void
    {
        $properties = $this->mapPropertiesToDb();
        $columns2params = [];
        $param2value = [];

        foreach ($properties as $key => $value) {
            $param = ':' . $key;
            $columns2params[] = '`' . $key . '` = ' . $param;
            $param2value[$param] = $value;
        }

        $sql = 'UPDATE `' . static::getTableName() . '` SET ' .
            implode(', ', $columns2params) . ' WHERE `id` = :id';

        $db = Database::getInstance();
        $db->query($sql, $param2value, static::class);
    }

    private function insert(): void
    {
        $properties = array_filter($this->mapPropertiesToDb());
        $columns = [];
        $params = [];
        $param2value = [];

        foreach ($properties as $key => $value) {
            $columns[] = '`' . $key . '`';
            $param = ':' . $key;
            $params[] = $param;
            $param2value[$param] = $value;
        }

        $sql = 'INSERT INTO `' . static::getTableName() . '` (' .
            implode(', ', $columns) . ') VALUES (' . implode(', ', $params) . ')';

        $db = Database::getInstance();
        $db->query($sql, $param2value, static::class);

        $this->id = $db->getLastInsertId();
    }

    public function delete(): void
    {
        $sql = 'DELETE FROM `' . static::getTableName() . '` WHERE `id` = :id';
        $db = Database::getInstance();
        $db->query($sql, [':id' => $this->id], static::class);

        $this->id = null;
    }

    abstract protected static function getTableName(): string;
}

<?php

namespace Core\Creational\Singleton\Conceptual;

use Exception;

class Singleton
{
    protected static array $instances = [];

    protected function __construct() {}

    protected function __clone(): void {}

    public function __sleep(): array
    {
        throw new Exception('Cannot serialize a singleton class');

        return [];
    }

    public function __wakeup()
    {
        throw new Exception('Cannot unserialize singleton class');
    }

    public static function getInstance()
    {
        $cls = static::class;

        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}

// Class examples:

class DbConnection extends Singleton{}
class Logger extends Singleton{}
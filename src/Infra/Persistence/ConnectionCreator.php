<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Infra\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $path = dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'mydb.sqlite';

        return new PDO("sqlite:{$path}");
    }
}

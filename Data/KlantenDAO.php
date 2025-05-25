<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Klant;

class KlantenDAO
{
    public function connect(): PDO
    {
        return new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );
    }

    public function getAll() {}

    public function getById() {}

    public function create() {}

    public function update() {}

    public function delete() {}
}

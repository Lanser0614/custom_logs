<?php
declare(strict_types=1);

namespace App\Services\Logger\PgLogger\Logger;


use App\Services\Logger\PgLogger\Handler\DatabaseHandler;
use Monolog\Logger;

class DatabaseLogger
{
    public function __invoke(array $config): Logger
    {
        return new Logger('Database', [
            new DatabaseHandler(),
        ]);
    }
}

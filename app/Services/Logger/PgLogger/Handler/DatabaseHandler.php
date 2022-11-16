<?php
declare(strict_types=1);

namespace App\Services\Logger\PgLogger\Handler;

use Monolog\Handler\AbstractProcessingHandler;

class DatabaseHandler extends AbstractProcessingHandler
{

    protected function write(array $record): void
    {
        // TODO: Implement write() method.
    }
}

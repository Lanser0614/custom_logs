<?php
declare(strict_types=1);

namespace App\Services\Logger\PgLogger\Handler;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use JsonException;
use Monolog\Handler\AbstractProcessingHandler;

class DatabaseHandler extends AbstractProcessingHandler
{

    /**
     * @param array $record
     * @return void
     * @throws JsonException
     */
    protected function write(array $record): void
    {
        $data = [
            'instance' => gethostname(),
            'message' => $record['message'],
            'channel' => $record['channel'],
            'level' => $record['level'],
            'level_name' => $record['level_name'],
            'code_status' => $record['level_name'],
            'context' => json_encode($record['context'], JSON_THROW_ON_ERROR),
            'remote_addr' => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
            'created_by' => Auth::id() > 0 ? Auth::id() : null,
            'created_at' => $record['datetime']->format('Y-m-d H:i:s')
        ];

        Log::query()->create($data);
    }
}

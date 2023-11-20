<?php

namespace App\Actions\TotalLog;

use App\Interfaces\Repositories\TotalLogRepositoryInterface;
use Illuminate\Support\Facades\Log;

class TotalLogCreateAction
{
    /**
     * @param TotalLogRepositoryInterface $totalLogRepository
     */
    public function __construct(private readonly TotalLogRepositoryInterface $totalLogRepository)
    {
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        $ip = request()->ip();
        try {
            $body = $ip . ' ' . $_SERVER['SCRIPT_FILENAME'] . ' ' . json_encode(request()->all());
            $data = [
                'date' => date('Y:m:d'),
                'time' => date('H:i:s'),
                'body' => $body
            ];

            $this->totalLogRepository->create($data);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}

<?php

namespace App\Jobs;

use App\Api\Service;
use App\Notifications\Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Throwable;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Reset implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $resource_type_id;
    private string $resource_id;
    private string $bearer;

    public function __construct(
        string $bearer,
        string $resource_type_id,
        string $resource_id
    )
    {
        $this->resource_type_id = $resource_type_id;
        $this->resource_id = $resource_id;
        $this->bearer = $bearer;
    }

    public function handle()
    {
        $api = new Service($this->bearer);

        DB::table('adjusted_budget_item')
            ->where('resource_id', '=', $this->resource_id)
            ->delete();

        DB::table('paid_budget_item')
            ->where('resource_id', '=', $this->resource_id)
            ->delete();

        $response = $api->requestReset(
            $this->resource_type_id,
            $this->resource_id
        );

        if ($response['status'] !== 201) {
            throw new \Exception($response['content']);
        }
    }

    public function failed(Throwable $exception): void
    {
        Notification::route('mail', Config::get('app.config.exception_notification_email'))
            ->notify(new Exception(
                    $exception->getCode(),
                    $exception->getMessage(),
                    $exception->getFile(),
                    $exception->getLine(),
                    $exception->getTraceAsString()
                )
            );
    }
}

<?php
declare(strict_types=1);

namespace App\Actions\Budget;

use App\Actions\Action;
use App\Api\Service;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class AdoptDemo extends Action
{
    public function __invoke(
        Service $api,
        string $resource_type_id,
        string $resource_id,
    ): int
    {
        $resource_response = $api->resource($resource_type_id, $resource_id);
        if ($resource_response['status'] !== 200) {
            $this->message = 'Unable to fetch the resource for your Budget, please try again';
            return $resource_response['status'];
        }

        $data = $resource_response['content']['data'];
        unset($data['demo']);
        try {
            $payload = json_encode($data, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            $this->message = $e->getMessage();
            return 500;
        }

        $patch_resource_response = $api->resourceUpdate(
            $resource_type_id,
            $resource_id,
            ['data' => $payload]
        );

        if ($patch_resource_response['status'] === 204) {
            return 204;
        }

        $this->message = $patch_resource_response['content'];
        return $patch_resource_response['status'];
    }
}
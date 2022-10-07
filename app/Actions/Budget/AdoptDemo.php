<?php
declare(strict_types=1);

namespace App\Actions\Budget;

use App\Actions\Action;
use App\Api\Service;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
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
        $resource = $api->getResource($resource_type_id, $resource_id);
        if ($resource['status'] !== 200) {
            $this->message = 'Unable to fetch the resource for your Budget, please try again';
            return $resource['status'];
        }



        return 204;
    }
}
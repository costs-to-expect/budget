<?php
declare(strict_types=1);

namespace App\Actions\Budget\Item;

use App\Actions\Action;
use App\Api\Service;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Update extends Action
{
    public function __invoke(
        Service $api,
        string $resource_type_id,
        string $resource_id,
        string $item_id,
        array $input
    ): int
    {
        // Fetch the budget item from the API.
        // Check for differences between the current item and the new item data and build the payload
        // Return if no changes
        // Patch the item
        // Return or return validation errors

        return 422;
    }
}

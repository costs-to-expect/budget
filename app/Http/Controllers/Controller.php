<?php

namespace App\Http\Controllers;

use App\Api\Service;
use App\Models\AdjustedBudgetItem;
use App\Models\PaidBudgetItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected array $config;

    protected string $item_type_id;
    protected string $item_subtype_id;

    protected ?string $resource_type_id = null;
    protected ?string $resource_id = null;
    protected array $accounts = [];
    protected bool $demo = false;

    protected Service $api;

    protected array $budget_items = [];

    public function __construct()
    {
        $this->config = Config::get('app.config');
        $this->item_type_id = $this->config['item_type_id'];
        $this->item_subtype_id = $this->config['item_subtype_id'];
    }

    protected function bootstrap(Request $request)
    {
        $this->api = new Service($request->cookie($this->config['cookie_bearer']));

        $resource_types = $this->api->resourceTypes(['item-type' => $this->item_type_id]);

        if ($resource_types['status'] === 200) {

            if (count($resource_types['content']) === 1) {

                $resource_type_id = $resource_types['content'][0]['id'];
                $resources = $this->api->resources($resource_type_id, ['item-subtype' => $this->item_subtype_id]);

                if ($resources['status'] === 200) {

                    if (count($resources['content']) === 1) {
                        $this->resource_type_id = $resource_type_id;
                        $this->resource_id = $resources['content'][0]['id'];

                        $data = $resources['content'][0]['data'];
                        if ($data === null || (is_array($data) && array_key_exists('accounts', $data) === false)) {
                            $this->accounts = [];
                        }

                        if (is_array($data)) {
                            if(array_key_exists('accounts', $data) === true) {
                                $this->accounts = $data['accounts'];
                            }

                            if(array_key_exists('demo', $data) === true) {
                                $this->demo = true;
                            }
                        }

                        return true;
                    }

                    $create_resource_response = $this->api->resourceCreate($resource_type_id);
                    if ($create_resource_response['status'] === 201) {
                        $this->resource_type_id = $resource_type_id;
                        $this->resource_id = $create_resource_response['content']['id'];

                        return true;
                    }
                    abort($create_resource_response['status'], $create_resource_response['content']);
                } else {
                    abort($resources['status'], $resources['content']);
                }
            } else {
                $create_resource_type_response = $this->api->resourceTypeCreate();
                if ($create_resource_type_response['status'] === 201) {

                    $this->resource_type_id = $create_resource_type_response['content']['id'];

                    $create_resource_response = $this->api->resourceCreate($this->resource_type_id);
                    if ($create_resource_response['status'] === 201) {
                        $this->resource_id = $create_resource_response['content']['id'];

                        return true;
                    }
                }

                abort($create_resource_type_response['status'], $create_resource_type_response['content']);
            }
        } else {
            abort($resource_types['status'], $resource_types['content']);
        }
    }

    protected function getBudgetItems(): array
    {
        $response = $this->api->budgetItems(
            $this->resource_type_id,
            $this->resource_id,
            [
                'limit' => 50,
                'sort' => 'amount:desc|created:asc'
            ]
        );
        if ($response['status'] !== 200) {
            abort($response['status'], $response['content']);
        }

        return $response['content'];
    }

    protected function setUpBudget(Request $request): \App\Service\Budget\Service
    {
        $this->budget_items = $this->getBudgetItems();

        $budget = new \App\Service\Budget\Service();
        if ($request->query('month') !== null && $request->query('year') !== null) {
            $budget->setPagination((int) $request->query('month'), (int) $request->query('year'));
        }

        if (
            $request->route('item_id') !== null &&
            $request->query('item-month') !== null &&
            $request->query('item-year') !== null
        ) {
            $budget->setSelected(
                $request->route('item_id'),
                (int) $request->query('item-month'),
                (int) $request->query('item-year')
            );
        }

        $budget->setAccounts($this->accounts)
            ->create();

        $paid_budget_items = (new PaidBudgetItem())->getPaidBudgetItems(
            $this->resource_id,
            $budget->nowYear(),
            $budget->nowMonth()
        );

        $adjustments = (new AdjustedBudgetItem())->getAdjustments($this->resource_id);

        $budget->setPaidBudgetItems($paid_budget_items);
        $budget->setAdjustments($adjustments);

        foreach ($this->budget_items as $budget_item) {
            $budget->addItem($budget_item);
        }

        $budget->assignItemsToBudget();

        return $budget;
    }
}

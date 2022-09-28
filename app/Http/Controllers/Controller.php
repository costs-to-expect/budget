<?php

namespace App\Http\Controllers;

use App\Api\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
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

    protected Service $api;

    protected array $mock_data;
    protected array $mock_accounts_data;

    public function __construct()
    {
        $this->config = Config::get('app.config');
        $this->item_type_id = $this->config['item_type_id'];
        $this->item_subtype_id = $this->config['item_subtype_id'];

        $this->mock_accounts_data = [
            [
                'id' => 'default', // Needs to be a unique id
                'name' => 'Default',
                'type' => 'expense',
                'currency' => [
                    'id' => 1,
                    'code' => 'GBP',
                    'name' => 'Sterling'
                ],
                'balance' => 1254.36,
            ],
            [
                'id' => 'savings',
                'name' => 'Savings',
                'type' => 'savings',
                'currency' => [
                    'id' => 1,
                    'code' => 'GBP',
                    'name' => 'Sterling'
                ],
                'balance' => 126.33,
            ]
        ];

        $this->mock_data = [
            [
                'id' => 1,
                'name' => 'Salary',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 1866.00,
                'currency_code' => 'GBP',
                'category' => 'income',
                'start_date' => '2021-01-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ],
            [
                'id' => 2,
                'name' => 'Rent',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 850.00,
                'currency_code' => 'GBP',
                'category' => 'fixed',
                'start_date' => '2021-01-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ],
            [
                'id' => 3,
                'name' => 'Council Tax',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 163.00,
                'currency_code' => 'GBP',
                'category' => 'fixed',
                'start_date' => '2021-01-01',
                'end_date' => '2023-03-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 20,
                    'exclusions' => [
                        2, 3
                    ]
                ],
            ],
            [
                'id' => 4,
                'name' => 'Council Tax',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 170.00,
                'currency_code' => 'GBP',
                'category' => 'fixed',
                'start_date' => '2023-04-01',
                'end_date' => '2024-03-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 20,
                    'exclusions' => [
                        2, 3
                    ]
                ],
            ],
            [
                'id' => 5,
                'name' => 'Gas & Electric',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 275.00,
                'currency_code' => 'GBP',
                'category' => 'fixed',
                'start_date' => '2021-01-01',
                'end_date' => '2023-12-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 15,
                    'exclusions' => []
                ],
            ],
            [
                'id' => 6,
                'name' => 'Guitar Lessons',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 25.00,
                'currency_code' => 'GBP',
                'category' => 'flexible',
                'start_date' => '2021-01-01',
                'end_date' => '2023-12-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 15,
                    'exclusions' => []
                ],
            ],
            [
                'id' => 7,
                'name' => 'Holiday Savings',
                'account' => 'default',
                'target_account' => 'savings',
                'description' => 'This is a description for the expense',
                'amount' => 150.00,
                'currency_code' => 'GBP',
                'category' => 'savings',
                'start_date' => '2021-01-01',
                'end_date' => '2023-12-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 15,
                    'exclusions' => []
                ],
            ],
            [
                'id' => 8,
                'name' => 'TV, Phone & Internet',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 75.00,
                'currency_code' => 'GBP',
                'category' => 'flexible',
                'start_date' => '2021-01-01',
                'end_date' => '2023-12-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 15,
                    'exclusions' => []
                ],
            ],
            [
                'id' => 9,
                'name' => 'School Uniform',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 45.00,
                'currency_code' => 'GBP',
                'category' => 'flexible',
                'start_date' => '2022-09-01',
                'end_date' => '2023-12-31',
                'disabled' => true,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 15,
                    'month' => 9,
                    'exclusions' => []
                ],
            ],
            [
                'id' => 10,
                'name' => 'Netflix',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 16.99,
                'currency_code' => 'GBP',
                'category' => 'flexible',
                'start_date' => '2021-10-15',
                'end_date' => '2023-12-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ],
            [
                'id' => 11,
                'name' => 'Disney +',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 16.99,
                'currency_code' => 'GBP',
                'category' => 'flexible',
                'start_date' => '2022-10-05',
                'end_date' => null,
                'disabled' => true,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 5,
                    'exclusions' => []
                ]
            ],
            [
                'id' => 12,
                'name' => 'Car Insurance',
                'account' => 'default',
                'target_account' => null,
                'description' => 'This is a description for the expense',
                'amount' => 625.00,
                'currency_code' => 'GBP',
                'category' => 'fixed',
                'start_date' => '2022-11-01',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 3,
                    'month' => 11,
                    'exclusions' => []
                ]
            ]
        ];
    }

    protected function bootstrap(Request $request)
    {
        $this->api = new Service($request->cookie($this->config['cookie_bearer']));

        $resource_types = $this->api->getResourceTypes(['item-type' => $this->item_type_id]);

        if ($resource_types['status'] === 200) {

            if (count($resource_types['content']) === 1) {

                $resource_type_id = $resource_types['content'][0]['id'];
                $resources = $this->api->getResources($resource_type_id, ['item-subtype' => $this->item_subtype_id]);

                if ($resources['status'] === 200) {

                    if (count($resources['content']) === 1) {
                        $this->resource_type_id = $resource_type_id;
                        $this->resource_id = $resources['content'][0]['id'];

                        return true;
                    }

                    $create_resource_response = $this->api->createResource($resource_type_id);
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
                $create_resource_type_response = $this->api->createResourceType();
                if ($create_resource_type_response['status'] === 201) {

                    $this->resource_type_id = $create_resource_type_response['content']['id'];

                    $create_resource_response = $this->api->createResource($this->resource_type_id);
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
}

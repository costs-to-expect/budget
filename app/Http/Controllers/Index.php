<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\Budget\Service;
use Illuminate\Http\Request;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Index extends Controller
{
    public function home(Request $request)
    {
        $this->bootstrap($request);

        $data = [
            [
                'name' => 'Salary',
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
                'name' => 'Rent',
                'description' => 'This is a description for the expense',
                'amount' => 850.00,
                'currency_code' => 'GBP',
                'category' => 'fixed',
                'start_date' => '2021-01-01',
                'end_date' => '2022-10-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                    'exclusions' => []
                ]
            ],
            [
                'name' => 'Gas & Electric',
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
                'name' => 'Guitar Lessons',
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
                'name' => 'Holiday Savings',
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
                'name' => 'TV, Phone & Internet',
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
                'name' => 'School Uniform',
                'description' => 'This is a description for the expense',
                'amount' => 45.00,
                'currency_code' => 'GBP',
                'category' => 'flexible',
                'start_date' => '2022-09-01',
                'end_date' => '2023-12-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 15,
                    'month' => 10,
                    'exclusions' => []
                ],
            ],
            [
                'name' => 'Netflix',
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
                'name' => 'Disney +',
                'description' => 'This is a description for the expense',
                'amount' => 16.99,
                'currency_code' => 'GBP',
                'category' => 'flexible',
                'start_date' => '2022-10-05',
                'end_date' => null,
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 5,
                    'exclusions' => []
                ]
            ]
        ];

        $budget = new Service();

        foreach ($data as $budget_item) {
            $budget->add($budget_item);
        }

        // Test with an annual expense
        // Convert months to an object, want everything that way
        // Rewrite active for month based on the frequency type
        // Get exclusions working
        // Get the totals working

        $budget->generate();

        //dd($budget->items(), $budget->months());

        return view(
            'home',
            [
                'months' => $budget->months()
            ]
        );
    }

    public function landing()
    {
        return view('landing');
    }
}

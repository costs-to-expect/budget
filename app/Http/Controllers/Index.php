<?php
declare(strict_types=1);

namespace App\Http\Controllers;

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
                ],
                'exclusions' => [11,12]
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
                ],
                'exclusions' => []
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
                ],
                'exclusions' => []
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
                ],
                'exclusions' => []
            ],
            [
                'name' => 'School Uniform',
                'description' => 'This is a description for the expense',
                'amount' => 45.00,
                'currency_code' => 'GBP',
                'category' => 'flexible',
                'start_date' => '2021-01-01',
                'end_date' => '2023-12-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'annually',
                    'day' => 15,
                    'month' => 10
                ],
                'exclusions' => []
            ],
            [
                'name' => 'Netflix',
                'description' => 'This is a description for the expense',
                'amount' => 16.99,
                'currency_code' => 'GBP',
                'category' => 'flexible',
                'start_date' => '2021-01-01',
                'end_date' => '2023-12-31',
                'disabled' => false,
                'frequency' => [
                    'type' => 'monthly',
                    'day' => 10,
                ],
                'exclusions' => []
            ]
        ];


        $budget = [];

        // Budget

        // Which months are visible
        // How many months are visible
        // Start month
        // Current month
        // Working date in month, not weekends?


        // Budget item (Income or Expense)

        // Name
        // Description
        // Start date
        // End date
        // Currency
        // Amount
        // Active (Function of start date and end date)
        // Disabled (User controlled option, manual version of active)
        // Type (Income or Expense)
        // Frequency (daily, weekly, monthly, annually (relevant options for each))
        // Added by


        return view('home');
    }

    public function landing()
    {
        return view('landing');
    }
}

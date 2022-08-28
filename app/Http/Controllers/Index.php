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

<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Account extends Controller
{
    public function index(Request $request)
    {
        $this->bootstrap($request);

        $user = $this->api->getAuthUser();

        if ($user['status'] !== 200) {

            // @todo Send a notification about the error
            abort(404, 'Unable to fetch your account information from the API');
        }

        return view(
            'account.index',
            [
                'user' => $user['content']
            ]
        );
    }
}

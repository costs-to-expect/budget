<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Account\DeleteAccount;
use App\Actions\Account\DeleteBudgetAccount;
use App\Actions\Account\Reset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function reset(Request $request)
    {
        $this->bootstrap($request);

        $user = $this->api->getAuthUser();

        if ($user['status'] !== 200) {

            // @todo Send a notification about the error
            abort(404, 'Unable to fetch your account information from the API');
        }

        return view(
            'account.reset',
            [
                'user' => $user['content']
            ]
        );
    }

    public function resetProcess(Request $request, Reset $action)
    {
        $this->bootstrap($request);

        $user = $this->api->getAuthUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account from the API');
        }

        $action(
            $request->cookie($this->config['cookie_bearer']),
            $this->resource_type_id,
            $this->resource_id
        );

        Auth::guard()->logout();

        return redirect()->route('landing');
    }

    public function deleteAccount(Request $request)
    {
        $this->bootstrap($request);

        $user = $this->api->getAuthUser();

        if ($user['status'] !== 200) {

            // @todo Send a notification about the error
            abort(404, 'Unable to fetch your account information from the API');
        }

        return view(
            'account.delete-account',
            [
                'user' => $user['content']
            ]
        );
    }

    public function deleteAccountProcess(Request $request, DeleteAccount $action)
    {
        $this->bootstrap($request);

        $user = $this->api->getAuthUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account from the API');
        }

        $action(
            $request->cookie($this->config['cookie_bearer']),
            $this->resource_type_id,
            $this->resource_id
        );

        Auth::guard()->logout();

        return redirect()->route('landing');
    }

    public function deleteBudgetAccount(Request $request)
    {
        $this->bootstrap($request);

        $user = $this->api->getAuthUser();

        if ($user['status'] !== 200) {

            // @todo Send a notification about the error
            abort(404, 'Unable to fetch your account information from the API');
        }

        return view(
            'account.delete-budget-account',
            [
                'user' => $user['content']
            ]
        );
    }

    public function deleteBudgetAccountProcess(Request $request, DeleteBudgetAccount $action)
    {
        $this->bootstrap($request);

        $user = $this->api->getAuthUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account from the API');
        }

        $action(
            $request->cookie($this->config['cookie_bearer']),
            $this->resource_type_id,
            $this->resource_id
        );

        Auth::guard()->logout();

        return redirect()->route('landing');
    }
}

<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Account\ChangePassword;
use App\Actions\Account\DeleteAccount;
use App\Actions\Account\DeleteBudgetAccount;
use App\Actions\Account\Reset;
use App\Actions\Account\UpdateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Account extends Controller
{
    public function changePassword(Request $request)
    {
        $this->bootstrap();

        $user = $this->api->authenticationUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account information from the API');
        }

        return view(
            'account.change-password',
            [
                'user' => $user
            ]
        );
    }

    public function changePasswordProcess(Request $request)
    {
        $this->bootstrap();

        $action = new ChangePassword();
        $result = $action(
            $this->api,
            $request->only(['password', 'password_confirmation'])
        );

        if ($result === 204) {
            return redirect()->route('account.index')
                ->with('status', 'password-changed');
        }

        if ($result === 422) {
            return redirect()
                ->route('account.change-password')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function index(Request $request)
    {
        $this->bootstrap();

        $user = $this->api->authenticationUser();

        if ($user['status'] !== 200) {

            // @todo Send a notification about the error
            abort(404, 'Unable to fetch your account information from the API');
        }

        return view(
            'account.index',
            [
                'user' => $user['content'],
                'status' => session('status'),
            ]
        );
    }

    public function reset(Request $request)
    {
        $this->bootstrap();

        $user = $this->api->authenticationUser();

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
        $this->bootstrap();

        $user = $this->api->authenticationUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account from the API');
        }

        $action(
            $request->cookie($this->config['cookie_bearer']),
            $this->resource_type_id,
            $this->resource_id
        );

        Auth::guard()->logout();

        sleep(3);

        return redirect()->route('landing');
    }

    public function deleteAccount(Request $request)
    {
        $this->bootstrap();

        $user = $this->api->authenticationUser();

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
        $this->bootstrap();

        $user = $this->api->authenticationUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account from the API');
        }

        $action(
            $request->cookie($this->config['cookie_bearer']),
            $this->resource_type_id,
            $this->resource_id
        );

        Auth::guard()->logout();

        sleep(3);

        return redirect()->route('landing');
    }

    public function deleteBudgetAccount(Request $request)
    {
        $this->bootstrap();

        $user = $this->api->authenticationUser();

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
        $this->bootstrap();

        $user = $this->api->authenticationUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account from the API');
        }

        $action(
            $request->cookie($this->config['cookie_bearer']),
            $this->resource_type_id,
            $this->resource_id
        );

        Auth::guard()->logout();

        sleep(3);

        return redirect()->route('landing');
    }

    public function updateProfile(Request $request)
    {
        $this->bootstrap();

        $user = $this->api->authenticationUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account information from the API');
        }

        return view(
            'account.update-profile',
            [
                'user' => $user
            ]
        );
    }

    public function updateProfileProcess(Request $request)
    {
        $this->bootstrap();

        $action = new UpdateProfile();
        $result = $action(
            $this->api,
            $request->only(['name', 'email'])
        );

        if ($result === 204) {
            return redirect()->route('account.index')
                ->with('status', 'profile-updated');
        }

        if ($result === 422) {
            return redirect()
                ->route('account.update-profile')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }
}

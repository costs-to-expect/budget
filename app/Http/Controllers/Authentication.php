<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Actions\Account\CreateNewPassword;
use App\Actions\Account\CreatePassword;
use App\Actions\Account\ForgotPassword;
use App\Actions\Account\Register;
use App\Actions\Account\SignIn;
use App\Service\Api\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Authentication extends Controller
{
    public function createNewPassword(Request $request): View
    {
        $encrypted_token = null;
        $email = null;

        if ($request->query('encrypted_token') !== null && $request->query('email') !== null) {
            $encrypted_token = $request->query('encrypted_token');
            $email = $request->query('email');
        }

        if ($encrypted_token === null && $email === null) {
            abort(404, 'Password cannot be created, registration parameters not found');
        }

        return view(
            'authentication.create-new-password',
            [
                'encrypted_token' => $encrypted_token,
                'email' => $email,
                'errors' => session()->get('validation.errors'),
                'failed' => session()->get('request.failed'),
            ]
        );
    }

    public function createNewPasswordProcess(Request $request): RedirectResponse
    {
        $api = new Service();

        $action = new CreateNewPassword();
        $result = $action(
            $api,
            $request->only(['encrypted_token', 'email', 'password', 'password_confirmation'])
        );

        if ($result === 204) {
            return redirect()->route('new-password-created');
        }

        if ($result === 422) {
            return redirect()->route('create-new-password.view', $action->getParameters())
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        return redirect()->route('create-new-password.view', $action->getParameters())
            ->with('request.failed', $action->getMessage());
    }

    public function createPassword(Request $request): View
    {
        $token = null;
        $email = null;

        if ($request->query('token') !== null && $request->query('email') !== null) {
            $token = $request->query('token');
            $email = $request->query('email');
        }

        if ($token === null && $email === null) {
            abort(404, 'Password cannot be created, registration parameters not found');
        }

        return view(
            'authentication.create-password',
            [
                'token' => $token,
                'email' => $email,
                'errors' => session()->get('validation.errors'),
                'failed' => session()->get('request.failed'),
            ]
        );
    }

    public function createPasswordProcess(Request $request): RedirectResponse
    {
        $api = new Service();

        $action = new CreatePassword();
        $result = $action(
            $api,
            $request->only(['token', 'email', 'password', 'password_confirmation'])
        );

        if ($result === 204) {
            return redirect()->route('registration-complete');
        }

        if ($result === 422) {
            return redirect()->route('create-password.view', $action->getParameters())
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        return redirect()->route('create-password.view', $action->getParameters())
            ->with('request.failed', $action->getMessage());
    }

    public function forgotPassword(): View
    {
        return view(
            'authentication.forgot-password',
            [
                'errors' => session()->get('validation.errors'),
                'failed' => session()->get('request.failed'),
            ]
        );
    }

    public function forgotPasswordProcess(Request $request): RedirectResponse
    {
        $api = new Service();

        $action = new ForgotPassword();
        $result = $action($api, $request->only(['email']));

        if ($result === 201) {
            return redirect()->route('forgot-password-email-issued');
        }

        if ($result === 422) {
            return redirect()->route('forgot-password.view')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        return redirect()->route('forgot-password.view')
            ->withInput()
            ->with('request.failed', $action->getMessage());
    }

    public function register(): View
    {
        return view(
            'authentication.register',
            [
                'errors' => session()->get('validation.errors'),
                'failed' => session()->get('request.failed'),
            ]
        );
    }

    public function registerProcess(Request $request): RedirectResponse
    {
        $api = new Service();

        $action = new Register();
        $result = $action(
            $api,
            $request->only(['name', 'email'])
        );

        if ($result === 201) {
            return redirect()->route(
                'create-password.view',
                $action->getParameters()
            );
        }

        if ($result === 422) {
            return redirect()->route('register.view')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        return redirect()->route('register.view')
            ->with('request.failed', $action->getMessage());
    }

    public function signIn(): View
    {
        return view(
            'authentication.sign-in',
            [
                'errors' => session()->get('validation.errors'),
            ]
        );
    }

    public function signInProcess(Request $request): RedirectResponse
    {
        $action = new SignIn();
        $result = $action(
            $request->only(['email', 'password', 'remember_me'])
        );

        if ($result === 422) {
            return redirect()->route('sign-in.view')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        return redirect()->route('home');
    }

    public function signOut(): RedirectResponse
    {
        Auth::guard()->logout();

        return redirect()->route('landing');
    }
}

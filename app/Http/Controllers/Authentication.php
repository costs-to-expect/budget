<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Account\Register;
use App\Api\Service;
use App\Notifications\ForgotPassword;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Authentication extends Controller
{
    public function createNewPassword(Request $request)
    {
        $token = null;
        $email = null;

        if (session()->get('authentication.parameters') !== null) {
            $token = session()->get('authentication.parameters')['token'];
            $email = session()->get('authentication.parameters')['email'];
        }

        if ($request->input('token') !== null && $request->input('email') !== null) {
            $token = $request->input('token');
            $email = $request->input('email');
        }

        if ($token === null && $email === null) {
            abort(404, 'Password cannot be created, registration parameters not found');
        }

        return view(
            'authentication.create-new-password',
            [
                'token' => $token,
                'email' => $email,
                'errors' => session()->get('authentication.errors'),
                'failed' => session()->get('authentication.failed'),
            ]
        );
    }

    public function createNewPasswordProcess(Request $request)
    {
        $api = new Service();

        $response = $api->createNewPassword(
            $request->only(['token', 'email', 'password', 'password_confirmation'])
        );

        if ($response['status'] === 204) {
            return redirect()->route('new-password-created');
        }

        if ($response['status'] === 422) {
            return redirect()->route(
                'create-new-password.view',
                [
                    'token' => $request->input('token'),
                    'email' => $request->input('email'),
                ])
                ->withInput()
                ->with('authentication.errors', $response['fields']);
        }

        return redirect()->route(
            'create-new-password.view',
            [
                'token' => $request->input('token'),
                'email' => $request->input('email'),
            ])
            ->with('authentication.failed', $response['content']);
    }

    public function createPassword(Request $request)
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

        $action = new \App\Actions\Account\CreatePassword();
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

    public function forgotPassword()
    {
        return view(
            'authentication.forgot-password',
            [
                'errors' => session()->get('validation.errors'),
                'failed' => session()->get('request.failed'),
            ]
        );
    }

    public function forgotPasswordProcess(Request $request)
    {
        $api = new Service();

        $action = new \App\Actions\Account\ForgotPassword();
        $result = $action($api,$request->only(['email']));

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

    public function register()
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
            $request->only(['name','email'])
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
            ->with('authentication.failed', $action->getMessage());
    }

    public function signIn()
    {
        return view(
            'authentication.sign-in',
            [
                'errors' => session()->get('authentication.errors')
            ]
        );
    }

    public function signInProcess(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials, $request->input('remember_me') !== null)) {
            return redirect()->route('home');
        }

        return redirect()->route('sign-in.view')
            ->withInput()
            ->with(
                'authentication.errors',
                Auth::errors()
            );
    }

    public function signOut(): RedirectResponse
    {
        Auth::guard()->logout();

        return redirect()->route('landing');
    }
}

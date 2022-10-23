<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Account\ChangePassword;
use App\Actions\Account\UpdateProfile;
use App\Api\Service;
use App\Models\PartialRegistration;
use App\Notifications\CreatePassword;
use App\Notifications\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Authentication extends Controller
{
    public function changePassword(Request $request)
    {
        $this->bootstrap($request);

        $user = $this->api->getAuthUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account information from the API');
        }

        return view(
            'authentication.change-password',
            [
                'user' => $user
            ]
        );
    }

    public function changePasswordProcess(Request $request)
    {
        $this->bootstrap($request);

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

    public function createPassword(Request $request)
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
            'authentication.create-password',
            [
                'token' => $token,
                'email' => $email,
                'errors' => session()->get('authentication.errors'),
                'failed' => session()->get('authentication.failed'),
            ]
        );
    }

    public function createPasswordProcess(Request $request)
    {
        $api = new Service();

        $response = $api->createPassword(
            $request->only(['token', 'email', 'password', 'password_confirmation'])
        );

        if ($response['status'] === 204) {

            Notification::route('mail', $request->input('email'))
                ->notify(new Registered());

            PartialRegistration::query()
                ->where('token', '=', $request->input('token'))
                ->delete();

            return redirect()->route('registration-complete');
        }

        if ($response['status'] === 422) {
            return redirect()->route(
                'create-password.view',
                [
                    'token' => $request->input('token'),
                    'email' => $request->input('email'),
                ])
                ->withInput()
                ->with('authentication.errors', $response['fields']);
        }

        return redirect()->route(
            'create-password.view',
            [
                'token' => $request->input('token'),
                'email' => $request->input('email'),
            ])
            ->with('authentication.failed', $response['content']);
    }

    public function register()
    {
        return view(
            'authentication.register',
            [
                'errors' => session()->get('authentication.errors'),
                'failed' => session()->get('authentication.failed'),
            ]
        );
    }

    public function registerProcess(Request $request)
    {
        $api = new Service();

        $response = $api->register(
            $request->only(['name','email'])
        );

        if ($response['status'] === 201) {
            $parameters = $response['content']['uris']['create-password']['parameters'];

            $model = new PartialRegistration();
            $model->token = $parameters['token'];
            $model->email = $parameters['email'];
            $model->save();

            Notification::route('mail', $request->input('email'))
                ->notify((new CreatePassword($parameters['email'], $parameters['token']))->delay(now()->addMinute()));

            return redirect()->route('create-password.view')
                ->with('authentication.parameters', $parameters);
        }

        if ($response['status'] === 422) {
            return redirect()->route('register.view')
                ->withInput()
                ->with('authentication.errors', $response['fields']);
        }

        return redirect()->route('register.view')
            ->with('authentication.failed', $response['content']);
    }

    public function registrationComplete()
    {
        return view(
            'authentication.registration-complete',
            [
            ]
        );
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

    public function updateProfile(Request $request)
    {
        $this->bootstrap($request);

        $user = $this->api->getAuthUser();

        if ($user['status'] !== 200) {
            abort(404, 'Unable to fetch your account information from the API');
        }

        return view(
            'authentication.update-profile',
            [
                'user' => $user
            ]
        );
    }

    public function updateProfileProcess(Request $request)
    {
        $this->bootstrap($request);

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

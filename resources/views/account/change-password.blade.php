<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Change Password</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
    </head>
    <body>
        <x-offcanvas active="account.change-password"/>

        <div class="col-lg-8 col-xl-6 mx-auto p-3">

            <div class="row">
                <div class="col-12">
                    <h2 class="display-5 mt-3 mb-3">Change Password</h2>

                    <p class="lead">Your can change your password using the form below. Please note,
                        if you change your password you will need to use the new password for all Apps in
                        the Costs to Expect service.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 pt-2 pb-5">
                    <h4 class="alert-heading">Password</h4>

                    <p class="lead">Set a new password for your account.</p>

                    <form action="{{ route('account.change-password.process') }}" method="POST" class="row g-2">

                        @csrf

                        <div class="col-12 col-md-6">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control <x-validation-error field='password' />" id="password" aria-describedby="password-help" required value="{{ old('password') }}" />
                            <div id="password-help" class="form-text">Please enter your new password, at least 12 characters please, <em>your password will be hashed</em>.</div>
                            <x-validation-error-message field="password" />
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control <x-validation-error field='password_confirmation' />" id="password_confirmation" aria-describedby="password_confirmation-help" required value="{{ old('password_confirmation') }}" />
                            <div id="password_confirmation-help" class="form-text">Please enter your password again, we just need to confirm you didn't make a typo.</div>
                            <x-validation-error-message field="password_confirmation" />
                        </div>

                        <div class=col-12">
                            <button type="submit" class="btn btn-sm btn-dark" title="Save new password">Save</button>
                            <a href="{{ route('account.index') }}" class="btn btn-sm btn-outline-primary" title="Return to Your Account">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Change Password</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
    </head>
    <body>
        <x-offcanvas active="account.change-password"/>

        <div class="col-lg-8 mx-auto p-3">

            <div class="row">
                <div class="col-12">
                    <h2 class="display-5 mt-3 mb-3">Change Password</h2>

                    <p class="lead">Change your password with the Costs to Expect service. If you change
                        your password here you will need to use your new password in all our Apps.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mx-auto p-3">
                    <div class="alert alert-dark mt-2" role="alert">
                        <h4 class="alert-heading">Set New Password</h4>

                        <p>Set a new password using the form below.</p>
                        <hr>

                        <form action="{{ route('account.change-password.process') }}" method="POST" class="row g-2">

                            @csrf

                            <div class=col-12">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control <x-validation-error field='password' />" id="password" aria-describedby="password-help" required value="{{ old('password') }}" />
                                <div id="password-help" class="form-text">Please enter your new password, at least 12 characters please, <em>your password will be hashed</em>.</div>
                                <x-validation-error-message field="password" :oldStyle="true" />
                            </div>

                            <div class=col-12">
                                <label for="password_confirmation" class="form-label">Confirm password</label>
                                <input type="password" name="password_confirmation" class="form-control <x-validation-error field='password_confirmation' />" id="password_confirmation" aria-describedby="password_confirmation-help" required value="{{ old('password_confirmation') }}" />
                                <div id="password_confirmation-help" class="form-text">Please enter your password again, we just need to confirm you didn't make a typo.</div>
                                <x-validation-error-message field="password_confirmation" :oldStyle="true" />
                            </div>

                            <div class=col-12">
                                <button type="submit" class="btn btn-sm btn-dark" title="Save new password">Save</button>
                                <a href="{{ route('account.index') }}" class="btn btn-sm btn-outline-primary" title="Return to Your Account">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

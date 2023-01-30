<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
    <meta name="author" content="Dean Blackborough">
    <title>Budget: Forgot Password</title>
    <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
    <style>
        .site-header {
            background-color: #000000;
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            backdrop-filter: saturate(180%) blur(20px);
        }
    </style>
</head>
<body>
    <header class="site-header sticky-top py-1">
        <x-api-status />
        <x-navbar />
    </header>
    <div class="container-fluid pt-5">
        <div class="row d-flex align-items">
        <div class="col-12">
            <div class="header text-center">
                <h1 class="display-1">Budget</h1>
                <h2 class="display-6">Simplified Budgeting</h2>
                powered by <a href="https://api.costs-to-expect.com">
                    <img src="{{ asset('images/logo.png') }}" width="64" height="64" alt="Costs to Expect Logo" title="Powered by the Costs to Expect API">
                    <span class="d-none">C</span>osts to Expect API
                </a>
            </div>

            <form action="{{ route('create-new-password.process') }}" method="POST" class="col-12 col-md-4 col-lg-4 mx-auto p-2">

                @csrf

                <h4 class="text-center">Create New Passowrd</h4>

                @if ($failed !== null)
                    <p class="alert alert-danger">We were unable to create your password, the API returned the
                        following error "{{ $failed }}". Please check our <a href="https://status.costs-to-expect.com">status</a>
                        page and try again later.</p>
                @endif

                <div class="mt-3 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control <x-validation-error field='password' />" id="password" aria-describedby="password-help" required value="{{ old('password') }}" />
                    <div id="password-help" class="form-text">Please enter a password, at least 12 characters please, <em>your password will be hashed</em>.</div>
                    <x-validation-error-message field="password" />
                </div>

                <div class="mt-3 mb-3">
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input type="password" name="password_confirmation" class="form-control <x-validation-error field='password_confirmation' />" id="password_confirmation" aria-describedby="password_confirmation-help" required value="{{ old('password_confirmation') }}" />
                    <div id="password_confirmation-help" class="form-text">Please enter your password again</div>
                    <x-validation-error-message field="password_confirmation" />
                </div>
                <input type="hidden" name="encrypted_token" value="{{ old('encrypted_token', $encrypted_token) }}" />
                <input type="hidden" name="email" value="{{ old('email', $email) }}" />
                <button type="submit" class="btn btn-primary w-100" title="Set your password">Set Password</button>
            </form>
        </div>
    </div>
    </div>
    <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}" defer></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
    <meta name="author" content="Dean Blackborough">
    <title>Registration Complete</title>
    <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
    <x-open-graph />
    <x-twitter-card />
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

                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mx-auto p-2">

                    <h4 class="text-center pt-3">All Done!</h4>

                    <p class="lead">Your account is ready, you are free to
                        <a href="{{ route('sign-in.view') }}" title="Go to sign-in">sign-in</a>
                        immediately and start setting up your budget, enjoy!</p>

                    <p>If you have any suggestions, reach out to us on
                        <a href="https://github.com/costs-to-expect/budget/issues" title="Visit issues section on GitHub">GitHub</a>, we are
                        always looking for help with improving our apps.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}" defer></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
</body>
</html>

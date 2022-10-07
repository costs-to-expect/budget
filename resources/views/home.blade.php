<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Home</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-8 mx-auto p-3">

            @if($demo === true)
            <div class="row">
                <div class="col-12 mx-auto p-2">
                    <div class="alert alert-dark mt-2" role="alert">
                        <h4 class="alert-heading">Demo Mode</h4>
                        <p class="lead">You are in Demo Mode and are free to play with all the features.</p>
                        <p class="lead">This demo is specific to you, when you are ready, you can click the
                            adopt button below to exit demo mode.</p>
                        <hr>
                        <form action="" method="POST" class="row g-2">
                            @csrf
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Adopt Demo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <x-budget
                :accounts="$accounts"
                :months="$months"
                :pagination="$pagination"
                :viewEnd="$view_end"
                :active="false"
                :projection="$projection"
                :hasAccounts="$has_accounts"
                :hasBudget="$has_budget"/>

            <x-requests />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

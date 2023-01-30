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
                        <p class="lead">You are viewing your Demo and are free to play with all the features.</p>

                        <p class="lead">
                            You can add new expenses and accounts using the "New" buttons just above the
                            demo Budget.
                        </p>

                        <p class="lead">This demo is specific to you. When you are ready click the
                            "Adopt Demo" button to take ownership of this Budget.</p>

                        <p class="lead">Alternatively, you can start afresh by using the "Reset App" option, this will
                            return the App to the state it was when you first signed in.</p>

                        <hr />

                        <form action="{{ route('demo.adopt.process') }}" method="POST" class="row g-2">
                            @csrf
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-sm btn-primary" title="Take ownership of the demo budget">
                                    Adopt Demo
                                </button>

                                <a class="btn btn-sm btn-outline-primary" href="{{ route('account.reset') }}" title="Reset the App">
                                    Reset App
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            @if ($has_budget === true && $has_accounts === true && $demo === false)
            <div class="alert alert-dark mt-2" role="alert">
                <h4 class="alert-heading">Up to Date?</h4>
                <p class="mb-0">Have you updated your account balances? Use the "<a href="{{ route('budget.account.set-balances') }}">Set Balances</a>" buttons to
                    set the balance for today?</p>
            </div>
            @endif

            <div class="budget">
                @if ($has_budget === true)

                    @if ($has_accounts)
                    <x-budget-controls
                        :hasSavingsAccount="$has_savings_account"
                        :hasPaidItems="$has_paid_items"
                        :nowVisible="$now_visible"
                    />
                    @endif

                    <x-budget
                        :months="$months" />

                    <x-budget-expenditure
                        :months="$months" />

                    <x-budget-ratios
                        :months="$months" />

                    <x-budget-pagination
                        :pagination="$pagination" />

                    <x-budget-projections
                        :accounts="$accounts"
                        :viewEnd="$view_end"
                        :projection="$projection" />

                @else
                    <x-budget-missing
                        :hasAccounts="$has_accounts"
                        :hasSavingsAccount="$has_savings_account"
                    />
                @endif

                <x-budget-definitions />
            </div>

            <x-help />

            <x-requests :requests="$requests" />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
        <script src="{{ asset('js/filter-budget.js') }}" defer></script>
        <script src="{{ asset('js/toggle-paid.js') }}" defer></script>
    </body>
</html>

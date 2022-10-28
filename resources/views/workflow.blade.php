<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: How it works</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
        <x-open-graph />
        <x-twitter-card />
        <style>
            .container {
                max-width: 960px;
            }

            .site-header {
                background-color: #000000;
                -webkit-backdrop-filter: saturate(180%) blur(20px);
                backdrop-filter: saturate(180%) blur(20px);
            }
        </style>
    </head>
    <body>

        @auth
        <x-offcanvas active="workflow"/>
        @else
        <header class="site-header sticky-top py-1">
            <nav class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="py-2 text-center" href="{{ route('landing') }}" aria-label="Product">
                    <img src="{{ asset('images/logo.png') }}" alt="Costs to Expect Logo" width="48" height="48" title="Costs to Expect" />
                </a>
            </nav>
        </header>
        @endauth

        <div class="col-lg-8 mx-auto p-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-4 mt-3 mb-3">How It Works</h2>

                    <p class="lead">Once you have added all your income and expenses to your Budget, there
                        are two parts to the workflow. Check below to see how it works.
                    </p>

                    <p class="lead">Learn how to define your Budget with our <a href="{{ route('getting-started') }}" title="Visit our Getting Started page">Getting Started</a> page.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/workflow/balances.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="Shot of account balances and edit icons" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 1: Update Your balances</h1>
                    <p class="lead">Set the current balances for any of the accounts known to Budget.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/workflow/set-as-paid.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="Image of the set as paid button and description of action" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 2: Mark as Paid</h1>
                    <p class="lead">For the current month, we need to know which items have already been
                        accounted for. Select the budget item and "Mark as Paid".</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/workflow/projections.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="Image of budget projections, calculated from balances and known budget items" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">View Your Projections</h1>
                    <p class="lead">Once we know your starting balances and everything due to come in and
                        go out, we can generate your projections.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mx-auto p-3">
            <div class="row">
                <div class="col-12">
                    <x-footer />
                </div>
            </div>
        </div>

        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

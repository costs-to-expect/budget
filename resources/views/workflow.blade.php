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
                <nav class="container-fluid d-flex navbar-dark">
                    <a class="navbar-brand p-0 me-0 me-lg-2" href="{{ route('landing') }}" aria-label="Budget by Costs to Expect">
                        <img src="{{ asset('images/logo.png') }}" alt="Costs to Expect Logo" width="40" height="40" title="Costs to Expect" />
                    </a>
                    <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                        <li class="nav-item px-1">
                            <a class="nav-link py-2 px-1 px-lg-2" href="{{ route('version-compare') }}">Versions</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link py-2 px-1 px-lg-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Budgeting
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('what-is-budgeting') }}">What is Budgeting?</a></li>
                                <li><a class="dropdown-item" href="">Page 2</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link py-2 px-1 px-lg-2 active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Support
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('getting-started') }}">Getting Started</a></li>
                                <li><a class="dropdown-item" href="{{ route('workflow') }}">Workflow</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('help.add-expense') }}">How do I add an expense item?</a></li>
                                <li><a class="dropdown-item" href="{{ route('help.add-income') }}">How do I add an income item?</a></li>
                                <li><a class="dropdown-item" href="{{ route('help.add-savings') }}">How do I add a savings item?</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('faqs') }}">FAQs</a></li>
                                <li><a class="dropdown-item" href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                            </ul>
                        </li>
                    </ul>
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
                    <img src="{{ asset('images/workflow/update-balances.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="Shot of account update balances screen" width="400" height="400" loading="lazy">
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
                    <img src="{{ asset('images/workflow/mark-as-paid.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="Image of the set as paid button and description of action" width="400" height="400" loading="lazy">
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
                    <img src="{{ asset('images/workflow/view-projections.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="Image of budget projections, calculated from balances and known budget items" width="400" height="400" loading="lazy">
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

        <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}" defer></script>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

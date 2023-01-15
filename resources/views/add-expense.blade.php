<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Add Expense</title>
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
        <x-offcanvas active="help.add-expense"/>
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
                            <li><a class="dropdown-item" href="">Page 1</a></li>
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
                    <h2 class="display-4 mt-3 mb-3">Add Expense</h2>

                    <p class="lead">To create a new expense budget item please follow the steps below.</p>

                    <p class="lead">If you need anymore help, please review our <a href="{{ route('faqs') }}">FAQs</a> section.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/income/new-income.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="The new expense button is highlighted on the Budget Overview" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 1: Select Add Expense</h1>
                    <p class="lead">From the Budget Overview select the add expense button, this will take
                        you to the form, so you can add all the necessary details.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/expense/set-account-and-frequency.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="The new expense form with the account and repeats selector highlighted" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 2: Choose account and frequency</h1>
                    <p class="lead">Choose the account the expense will be deducted from.You will also need
                        to choose the repeat frequency, you can choose, monthly, annually or one-off.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/expense/set-exclusions.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="The exclusions section on the new expense form" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 3: Set Exceptions</h1>
                    <p class="lead">If the expense repeats monthly, set any exclusions. In the UK
                        we typically don't pay Council Tax in Feb and March. If you tick Feb and March, the expense
                        will not appear on your Budget during the excluded months.</p>
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

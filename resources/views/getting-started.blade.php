<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Getting Started</title>
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
        <x-offcanvas active="getting-started"/>
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
                    <h2 class="display-4 mt-3 mb-3">Getting Started</h2>

                    <p class="lead">Before you can follow the workflow, you need to get your Budget setup,
                        you can do this manually, or you can load up our Demo and adjust it to your needs.
                    </p>

                    <p class="lead">If you have your Budget setup, check-out our <a href="{{ route('workflow') }}" title="Visit out Workflow page">Workflow</a> page.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/getting-started/add-an-account.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="The add a new account form" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 1: Add your accounts</h1>
                    <p class="lead">Any any accounts you want Budget to track, we need a name and a starting balance.
                    If you want to track your savings you can add savings accounts.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/getting-started/add-a-budget-item.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="The add a budget item form" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 2: Add Your budget Items</h1>
                    <p class="lead">Add all income and expenditure to you Budget. Items on your Budget
                        are income or expenditure and can be set to repeat monthly or annually.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/getting-started/set-exclusions.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="Set exclusions for budget items" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 3: Set Exclusions</h1>
                    <p class="lead">Things don't always occur on a rigid schedule, when you need flexibility,
                        use our exclusions. Council Tax is an example of monthly expenditure that doesn't follow a
                        fixed schedule, for lots of us, we don't pay Council Tax in February and March.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/getting-started/view-projections.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 4: Projections</h1>
                    <p class="lead">Head on over to our <a href="{{ route('workflow') }}" title="View our Workflow page">Workflow</a> page to understand how we generate
                        your projections.</p>
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

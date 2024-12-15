<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-html-head title="Getting started" description="We have a shory article on how to get started with Budget our free budget calculator" />
    <body>

        @auth
        <x-offcanvas active="getting-started"/>
        @else
        <header class="site-header sticky-top py-1">
            <x-api-status />
            <x-navbar active="support"/>
        </header>
        @endauth

        <div class="col-lg-8 col-xl-6 mx-auto p-3">
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
                    <p class="lead">Add any accounts you want Budget to track, we need a name and a starting balance.
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
                    <p class="lead">We have help pages to guide you through adding each of our
                        supported budget item types,
                        <a href="{{ route('help.add-income') }}">income</a>,
                        <a href="{{ route('help.add-expense') }}">expense</a> and
                        <a href="{{ route('help.add-savings') }}">savings</a>.</p>
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
                    <img src="{{ asset('images/getting-started/view-projections.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="Budget overview projections for all accounts" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 4: Projections</h1>
                    <p class="lead">Head on over to our <a href="{{ route('workflow') }}" title="View our Workflow page">Workflow</a> page to understand how we generate
                        your projections.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-xl-6 mx-auto p-3">
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

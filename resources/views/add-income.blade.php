<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-html-head title="Add Income" description="How do you add an income budget item to your Budget?" />
    <body>

        @auth
        <x-offcanvas active="help.add-income"/>
        @else
        <header class="site-header sticky-top py-1">
            <x-api-status />
            <x-navbar active="support"/>
        </header>
        @endauth

        <div class="col-lg-8 mx-auto p-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-4 mt-3 mb-3">Add Income</h2>

                    <p class="lead">To create a new income budget item please follow the steps below.</p>

                    <p class="lead">If you need anymore help, please review our <a href="{{ route('faqs') }}">FAQs</a> section.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/income/new-income.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="The new income button is highlighted on the Budget Overview" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 1: Select Add Income</h1>
                    <p class="lead">From the Budget Overview select the add income button, this will take
                        you to the form, so you can add all the necessary details.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/income/choose-account.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="The new income form with the account selector highlighted" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 2: Choose Account</h1>
                    <p class="lead">Choose the account the income will go into. If you need to add a new account please
                        review our <a href="{{ route('getting-started') }}">getting started</a> page.</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/income/set-details.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="The new income form with example values" width="400" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Step 3: Set Details</h1>
                    <p class="lead">Set all the required information, at a minimum we need to know the frequency,
                        the start date and the amount. The amount should be the value you receive after any local
                        taxes.</p>
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

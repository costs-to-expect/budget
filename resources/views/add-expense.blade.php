<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-html-head title="Add Expense" description="How do you add an expense budget item to your Budget?" />
    <body>

        @auth
        <x-offcanvas active="help.add-expense"/>
        @else
        <header class="site-header sticky-top py-1">
            <x-api-status />
            <x-navbar active="support"/>
        </header>
        @endauth

        <div class="col-lg-8 col-xl-6 mx-auto p-3">
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
                    <img src="{{ asset('images/expense/set-account-and-frequency.png') }}" class="shadow d-block mx-lg-auto img-fluid" alt="The new expense form with the account and repeat selector highlighted" width="400" height="400" loading="lazy">
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

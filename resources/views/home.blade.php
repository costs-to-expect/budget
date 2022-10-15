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
                        <p class="lead">This demo is specific to you, when you are ready, you can click the
                            adopt button below to exit demo mode.</p>
                        <hr />
                        <h4 class="alert-heading">Do You Need Help?</h4>
                        <p class="lead">We have two sections which detail how our App works, check out
                            our <a href="{{ route('getting-started') }}">Getting Started</a> section to understand
                            how to add items to your Budget and checkout our <a href="{{ route('workflow') }}">Workflow</a> section to
                            understand how we generate your projections.</p>

                        <hr />
                        <form action="{{ route('demo.adopt.process') }}" method="POST" class="row g-2">
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

            <div class="row">
                <div class="col-12">
                    <h2 class="display-6 mt-5">Need Help?</h2>
                </div>
                <div class="col-12">
                    <p class="lead">If you are unsure how this page works, please consult our
                        <a href="{{ route('faqs') }}">FAQs</a>, hopefully we will have an answer to your questions.
                    </p>
                    <p class="lead">If you have a question that is not covered by our
                        <a href="{{ route('faqs') }}">FAQs</a>, please reach out to us on
                        <a href="https://twitter.com/coststoexpect">Twitter</a> or
                        via <a href="https://github.com/costs-to-expect/budget/issues">GitHub</a>, we will respond
                        as soon as we can.</p>
                </div>
            </div>

            <x-requests />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

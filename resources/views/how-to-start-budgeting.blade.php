<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-html-head title="How to start budgeting" description="How to start budgeting, we give you all the information to help get started" />
    <body>

        @auth
        <x-offcanvas active="how-to-start-budgeting"/>
        @else
        <header class="site-header sticky-top py-1">
            <x-api-status />
            <x-navbar active="budgeting" />
        </header>
        @endauth

        <div class="col-lg-8 mx-auto p-3">

            <div class="row">
                <div class="col-12">
                    <h2 class="display-5 mt-3 mb-3">How to Start Budgeting?</h2>

                    <p class="lead">
                        Budgeting is a bit like exercising. It can be difficult to motivate yourself to start but
                        once you take the plunge, it doesn't take long to reap the benefits.
                    </p>
                    <p class="lead">
                        A budget can help you manage your money and plan for the future. If you've decided to create
                        a budget, here's how to get started:
                    </p>

                    <ul>
                        <li class="mb-3">
                            <strong>Know what your net income is.</strong>
                            Seems simple, right? Just remember your net income is what you take home after tax and
                            other costs such as pension contributions have been deducted. If you receive any benefits,
                            remember to add these into the pot. If you're one half of a couple, you'll have extra
                            calculations to make.
                        </li>
                        <li class="mb-3">
                            <strong>Start tracking your expenses.</strong>
                            Before you even start a budget, you need to understand what you're spending. It's
                            important that you track everything – even those coffees on the way to work! You might be
                            surprised by how expenses add up. Track your spending for at least a month so that you
                            have a good understanding of your expenses.
                        </li>
                        <li class="mb-3">
                            <strong>List your expenses and label them.</strong>
                            Your expenses will fall into two categories: Fixed expenses are the ones which are
                            always the same and must be paid. Variable expenses can change from month to month and
                            are not strictly necessary – we call them the "fun stuff"!
                        </li>
                        <li class="mb-3">
                            <strong>Choose your budgeting approach.</strong>
                            What works for one person, won't work for everyone. There are
                            <a href="{{ route('what-is-budgeting') }}">several different</a> ways of
                            budgeting and it'’'s up to you to decide which approach suits you.
                        </li>
                        <li class="mb-3">
                            <strong>Start managing your money.</strong>
                            Ready for some more calculations? If the difference between your income and expenditure
                            is making money tight, you may have to make adjustments to your spending habits –
                            remember those variable expenses?!
                        </li>
                    </ul>

                    <p class="lead">
                        Now you're well on your way to having an effective budget and managing your money so that it
                        works for you. If you'd like to use the Costs to Expect Budget App, check out our
                        <a href="{{ route('getting-started') }}">Getting Started</a> page.
                    </p>

                </div>
            </div>

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}" defer></script>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

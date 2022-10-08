<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: FAQs</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="faqs"/>

        <div class="col-lg-8 mx-auto p-3">

            <div class="row">
                <div class="col-12">
                    <h2 class="display-5 mt-3 mb-3">Frequency Asked Questions</h2>

                    <p class="lead">Hopefully, any questions you have are answered below, if not,
                        reach out to us on <a href="https://twitter.com/coststoexpect">Twitter</a> or
                        via <a href="https://github.com/costs-to-expect/budget/issues">GitHub</a>
                    </p>

                    <hr />
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="display-6 mt-3 mb-3">What is Budget?</h3>
                    <p class="lead">Budget is a free, open source budgeting tool powered by the
                        Costs to Expect API.

                    <h3 class="display-6 mt-3 mb-3">Why Budget?</h3>
                    <p class="lead">Budget is so simple to use your child could manage your Budget, did
                        we mention it is free?</p>

                    <h3 class="display-6 mt-3 mb-3">How does it work?</h3>
                    <p class="lead">You define your Budget, tell us your balances, mark what has been paid
                        for the current month and based on that we give you future projections.</p>

                    <h3 class="display-6 mt-3 mb-3">Will Budget stay free?</h3>
                    <p class="lead">For as long as possible, Budget is/will be funded by the Costs to Expect API
                        and upon release, Budget Pro. We have no intention of monetising Budget*.</p>

                    <p class="small text-muted">We reserve the right to change this if sheer number of users make this
                        unviable for us (But we promise to do our best!)</p>

                    <h3 class="display-6 mt-3 mb-3">How do I delete my account?</h3>
                    <p class="lead">If you want to <a href="{{ route('account.index') }}">delete</a> your account, please go to the account section,
                        we have multiple data deletion options</p>

                    <h3 class="display-6 mt-3 mb-3">Will you update Budget after your release Budget Pro?</h3>
                    <p class="lead">Yes, both Budget and Budget Pro will receive regular updates, we
                        have an extensive list of upgrades we want to deliver for both Apps.</p>

                    <h3 class="display-6 mt-3 mb-3">Do you use Budget?</h3>
                    <p class="lead">Yes, however, once we release Budget Pro will be use that.
                        We continuously ensure we can manage our Budget with this version. We designed Budget to
                        account for our needs, if it can't manage our needs it is unlikely to work for anyone else.</p>

                    <h3 class="display-6 mt-3 mb-3">Do I need to give you my bank account details?</h3>
                    <p class="lead">No, Budget is a projection base budget tool, you tell us your balance and
                        based on your defined Budget we give you financial projections.</p>

                    <h3 class="display-6 mt-3 mb-3">Can I give you bank account details?</h3>
                    <p class="lead">Down the road, yes, a long term goal for Budget Pro is adding Open Banking support so
                        we can provide a more accurate projection and not need you to tell us what your balance is
                        and what expense you have to pay.</p>

                    <h3 class="display-6 mt-3 mb-3">What is Budget Pro?</h3>
                    <p class="lead">Budget Pro is the upgraded version of Budget, it includes sharing,
                        multiple budgets and many other extra features.</p>

                    <h3 class="display-6 mt-3 mb-3">Will I be able to upgrade to Budget Pro?</h3>
                    <p class="lead">Yes, upon release you will be able to upgrade to Budget Pro if you want to,
                        that is actually our preferred route. Your Budget will appear in Budget Pro and you will
                        access to all the new toys.</p>

                    <h3 class="display-6 mt-3 mb-3">Will I be able to downgrade from Budget Pro?</h3>
                    <p class="lead">We don't know yet but the goal is yes. Some data may need to be adjusted
                        during the downgrade but no data will be lost.</p>

                    <h3 class="display-6 mt-3 mb-3">When will Budget Pro release?</h3>
                    <p class="lead">We don't know yet, out goal is six months after the official release of Budget
                        but there is no fixed date.</p>

                    <h3 class="display-6 mt-3 mb-3">I need help?</h3>
                    <p class="lead">If you need help, please reach out to us on
                        <a href="https://twitter.com/coststoexpect">Twitter</a> or
                        via <a href="https://github.com/costs-to-expect/budget/issues">GitHub</a>, we will respond
                        as soon as we can.</p>
                </div>

            </div>

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

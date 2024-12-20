<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-html-head title="Budget - Frequency asked questions" description="Have a question about Budget, review our FAQs to see if we have an answer" />
    <body>

        @auth
        <x-offcanvas active="faqs"/>
        @else
        <header class="site-header sticky-top py-1">
            <x-api-status />
            <x-navbar active="support"/>
        </header>
        @endauth

        <div class="col-lg-8 col-xl-6 mx-auto p-3">

            <div class="row">
                <div class="col-12">
                    <h2 class="display-5 mt-3 mb-3">Frequency Asked Questions</h2>

                    <p class="lead">Hopefully, any questions you have are answered below, if not,
                        contact us via email @ <a href="mailto:support@costs-to-expect.com" title="Email us @ support@costs-to-expect.com">support@costs-to-expect.com</a> or
                        via <a href="https://github.com/costs-to-expect/budget/issues" title="Raise an issue on GitHub">GitHub</a>
                    </p>

                    <hr />
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="display-6 mt-3 mb-3">What is Budget?</h3>
                    <p class="lead">Budget is a <strong>free</strong>, open source budgeting tool powered
                        by the Costs to Expect API. In three simple steps, it enables you to manage your
                        budget and see projections for the future.</p>

                    <h3 class="display-6 mt-3 mb-3">Why Budget?</h3>
                    <p class="lead">Our overview is so clear and simple, a child could manage your budget.
                        We wouldn't recommend it but you get the idea.
                        Did we mention that it’s free?!</p>

                    <h3 class="display-6 mt-3 mb-3">How do I setup my Budget?</h3>
                    <p class="lead">Setting up your Budget is simple. Start by inputting your balances and expenses.
                        Mark which expenses have been paid for the month. We’ll give you projections for the months ahead.
                        It's that easy. Keep track of your budget and build your savings.</p>

                    <p class="lead">Check out our <a href="{{ route('getting-started') }}" title="View our Getting Started page">Getting Started</a>
                        section for more detail.</p>

                    <h3 class="display-6 mt-3 mb-3">What is the workflow?</h3>
                    <p class="lead">The workflow explains the simple steps you need to take each time you review
                        your Budget.</p>

                    <p class="lead">Check out our <a href="{{ route('workflow') }}" title="View our Workflow page">Workflow</a>
                        section for more detail.</p>

                    <h3 class="display-6 mt-3 mb-3">Can I disable a budget item?</h3>
                    <p class="lead">Yes, you can disable budget items by toggling them off/on again. When a budget
                        item is disabled, it will remain visible on your budget but it will not be used in any of
                        your projection calculations.</p>

                    <h3 class="display-6 mt-3 mb-3">Can I adjust the amount of a budget item?</h3>
                    <p class="lead">Yes, you can adjust the amount of a budget item on an adhoc basis by using the
                        "adjust amount" button. Select the relevant budget item and enter the new amount for the
                        chosen month - your projections will automatically update.</p>

                    <h3 class="display-6 mt-3 mb-3">Will Budget always be free?</h3>
                    <p class="lead">Budget is currently free and funded by the Costs to Expect API. We have no
                        intention of monetising Budget. However, we reserve the right to change this if sheer numbers
                        of users make it unviable for us to fund it. (But we promise to do our best!)</p>

                    <h3 class="display-6 mt-3 mb-3">How do I delete my account?</h3>
                    <p class="lead">We hope this isn't a question you'll ask but should you want to delete your account,
                        please go to "<a href="{{ route('account.index') }}" title="Visit Your Account">Your Account</a>" where we have multiple
                        data deletion options which are quick and easy.</p>

                    <h3 class="display-6 mt-3 mb-3">Do I need to give you my bank account details?</h3>
                    <p class="lead">No. Budget is a projection based budget tool - you tell us your balance and based
                        on your defined Budget, we'll provide you with your financial projections.</p>

                    <h3 class="display-6 mt-3 mb-3">Do you support Open Banking?</h3>
                    <p class="lead">Budget does not and will not support Open Banking. However, after the
                        beta release of <a href="https://budget-pro.costs-to-expect.com">Budget Pro</a>, our first priority will be to add Open Banking support.</p>

                    <h3 class="display-6 mt-3 mb-3">What is Budget Pro?</h3>
                    <p class="lead">Budget Pro is the upgraded version of Budget. It includes sharing, multiple
                        budgets as well many other extra features. It will be subject to a monthly subscription fee.</p>

                    <p class="lead">Please review our <a href="{{ route('version-compare') }}" title="Compare Budget to Budget Pro">Versions Matrix</a> to see how Budget and Budget Pro compare.</p>

                    <h3 class="display-6 mt-3 mb-3">Will I be able to upgrade to Budget Pro?</h3>
                    <p class="lead">Yes, upon release you will be able to upgrade to Budget Pro if you want to. Your
                        Budget will appear in Budget Pro and you will have access to all the new features.</p>

                    <h3 class="display-6 mt-3 mb-3">Will I be able to downgrade from Budget Pro?</h3>
                    <p class="lead">We don't know yet but the goal is yes. Some data may need to be adjusted during
                        the downgrade but no data will be lost.</p>

                    <h3 class="display-6 mt-3 mb-3">When will Budget Pro release?</h3>
                    <p class="lead">Budget Pro was released into alpha on the 2nd June. We are half through finishing
                        the development and pushing for a beta release in August/September.</p>

                    <h3 class="display-6 mt-3 mb-3">Will you update Budget after you release Budget Pro?</h3>
                    <p class="lead">Yes, both Budget and Budget Pro will receive regular updates and we have an
                        extensive list of upgrades planned for both Apps.</p>

                    <h3 class="display-6 mt-3 mb-3">Will Budget Pro be open source?</h3>
                    <p class="lead">No, Budget Pro will not be an open source product. It is a completely separate
                        App to Budget.</p>

                    <h3 class="display-6 mt-3 mb-3">Do you use Budget yourself?</h3>
                    <p class="lead">We firmly believe in using our own products. Budget has been developed, built
                        and tested using our own budgeting needs and we continuously ensure that we can manage our
                        Budget with this version. We understand that if Budget can't manage our needs, it's
                        unlikely to work for anyone else.</p>

                    <h3 class="display-6 mt-3 mb-3">What if I need further help?</h3>
                    <p class="lead">If you need help, please reach out to us on
                        <a href="mailto:support@costs-to-expect.com" title="Email us @ support@costs-to-expect.com">support@costs-to-expect.com</a> or
                        via <a href="https://github.com/costs-to-expect/budget/issues" title="Raise an issue on GitHub">GitHub</a>, we'll get back to
                        you as soon as we can.</p>
                </div>

            </div>

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}" defer></script>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

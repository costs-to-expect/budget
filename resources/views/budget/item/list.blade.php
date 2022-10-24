<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Budget Items</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="budget.item.list"/>

        <div class="col-lg-8 mx-auto p-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-4 mt-3 mb-3">Budget Items</h2>

                    <p class="lead">All you budget items are listed below, this is the definition of
                        your budget items, to see them in context you need to visit your
                        <a href="{{ route('home') }}">Budget</a>.</p>
                </div>
            </div>

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr class="bg-dark text-light">
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Type</th>
                            <th scope="col">Frequency</th>
                            <th scope="col">Status</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <tr>
                            <th>Council Tax</th>
                            <th>&pound;163.00</th>
                            <th><x-category category="fixed" /></th>
                            <th>Monthly, Except February, March</th>
                            <th>Active</th>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">More...</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Council Tax</th>
                            <th>&pound;163.00</th>
                            <th><x-category category="fixed" /></th>
                            <th>Monthly, Except February, March</th>
                            <th>Active</th>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">More...</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Council Tax</th>
                            <th>&pound;163.00</th>
                            <th><x-category category="fixed" /></th>
                            <th>Monthly, Except February, March</th>
                            <th>Active</th>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">More...</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Council Tax</th>
                            <th>&pound;163.00</th>
                            <th><x-category category="fixed" /></th>
                            <th>Monthly, Except February, March</th>
                            <th>Active</th>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">More...</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="display-6 mt-5">Need Help?</h2>
                </div>
                <div class="col-12">
                    <p class="lead">If you are unsure how our App works, please consult our
                        <a href="{{ route('faqs') }}">FAQs</a>. Hopefully we will have an answer
                        to your question.
                    </p>
                    <p class="lead">If you have a question that is not covered by our
                        <a href="{{ route('faqs') }}">FAQs</a>, please reach out to us on
                        <a href="https://twitter.com/coststoexpect">Twitter</a> or
                        via <a href="https://github.com/costs-to-expect/budget/issues">GitHub</a>.
                        We will respond as soon as we can.</p>
                </div>
            </div>

            <x-requests />

            <x-footer />
        </div>

        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

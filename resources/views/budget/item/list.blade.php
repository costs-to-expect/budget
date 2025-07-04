<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>All Budget Items</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="budget.item.list"/>

        <div class="col-lg-8 col-xl-6 mx-auto p-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-4 mt-3 mb-3">Budget Items</h2>

                    <p class="lead">All your budget items are listed below, click on "More" to see
                        the details for each budget item.</p>

                    <p class="lead">If you need to restore a deleted (not discarded) budget item.
                        you can use the "Restore" button.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="row mb-2">
                        <div class="col-12 col-md-4 col-lg-3">
                            <input type="text" name="table-filter" class="form-control form-control sm table-filter" placeholder="Filter budget items.." title="Filter the budget item table" />
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm table-borderless budget-items">
                            <caption>Every budget item you have defined, including all soft-deleted and expired items</caption>
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Frequency</th>
                                    <th scope="col">Exclusions</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $__item)
                                <x-budget-item-table-row :item="$__item" :accounts="$accounts" :year="$now_year" :month="$now_month"/>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if ($number_of_items > 10)
            <div class="row">
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" aria-label="Items limit" style="width: {{ ($number_of_items / $max_items) * 100 }}%" aria-valuenow="{{ $number_of_items }}" aria-valuemin="0" aria-valuemax="{{ $max_items }}"></div>
                    </div>

                    <p class="lead">
                        You have created {{ $number_of_items }} budget items, the limit is {{ $max_items }},
                        you can create another {{ $max_items - $number_of_items }}.</p>

                    <div class="p-2">
                        <div class="alert alert-primary fade show mt-3" role="alert">
                            <h4 class="alert-heading">Budget Pro!</h4>
                            <p>In Budget Pro there is not be a limit to the number of items you can create.</p>
                            <hr>
                            <p class="mb-0"><a href="https://budget-pro.costs-to-expect.com" target=_"blank" title="Compare Budget to Budget Pro">Find out more</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <x-help />

            <x-requests :requests="$requests" />

            <x-footer />
        </div>

        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
        <script src="{{ asset('js/filter-budget-item-list.js') }}" defer></script>
    </body>
</html>

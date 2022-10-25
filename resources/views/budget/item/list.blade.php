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
                                <th scope="col">Exclusions</th>
                                <th scope="col">Status</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($items as $__item)
                            <x-budget-item-table-row :item="$__item" :accounts="$accounts"/>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <x-help />

            <x-requests />

            <x-footer />
        </div>

        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

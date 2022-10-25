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
                            @foreach ($items as $__item)
                            <tr>
                                <td>{{ $__item['name'] }}</td>
                                <td><x-currency :currency="$__item['currency']" />{{ number_format($__item['amount'], 2) }}</td>
                                <td><x-category :category="$__item['category']" /></td>
                                <td>
                                    @if ($__item['frequency']['type'] === 'monthly')
                                        <div class="col-12">
                                            Monthly @if ($__item['frequency']['day'] !== null) around the <x-ordinal :day="$__item['frequency']['day']" /> of the month. @endif
                                        </div>
                                    @endif

                                    @if ($__item['frequency']['type'] === 'annually')
                                        <div class="col-12">
                                            Annually @if ($__item['frequency']['day'] !== null) around the <x-ordinal :day="$__item['frequency']['day']" /> of <x-month :month="$__item['frequency']['month']" /> @else in <x-month :month="$__item['frequency']['month']" /> @endif
                                        </div>
                                    @endif

                                    @if ($__item['frequency']['type'] === 'one-off')
                                        <div class="col-12">
                                            One-Off, due on {{ $__item['start_date']->format('d/m/Y') }}
                                        </div>
                                    @endif
                                </td>
                                <td>Active</td>
                                <td>
                                    <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#collapse{{ $__item['id'] }}" role="button" aria-expanded="false" aria-controls="collapse{{ $__item['id'] }}">
                                        More...
                                    </a>
                                </td>
                            </tr>
                            <tr class="collapse" id="collapse{{ $__item['id'] }}">
                                <td colspan="6">
                                    <table class="table table-sm table-borderless mb-0">
                                        <thead>
                                        <tr class="bg-grey text-light">
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Account</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                        <tr>
                                            <td>{{ $__item['start_date'] }}</td>
                                            <td>None Set</td>
                                            <td>Debit</td>
                                            <td>None Set</td>
                                            <td>Restore|View on Budget</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
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

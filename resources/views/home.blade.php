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

            <main class="budget">
                <div class="row">
                    <div class="col-12">
                        <h2 class="display-6 mt-3 mb-3">Your Budget</h2>
                    </div>
                </div>

                <div class="row">
                    @foreach ($months as $__month)
                    <div class="col-4 @if($loop->index === 1) border-start border-end border-primary border-opacity-50 @endif">
                        <div class="text-primary month pb-2">{{ $__month->name() }}</div>
                        <div class="row">
                            @foreach ($__month->items() as $__item)
                                <div class="col-12 expense">
                                    <div class="name text-grey">{{ $__item->name() }}</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-{{ $__item->category() }}" role="progressbar" aria-label="" style="width: {{ $__item->progressBarPercentage() }}%"
                                             aria-valuenow="{{ $__item->progressBarPercentage() }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="amount text-grey"><small>&pound;</small>{{ $__item->amount() }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row text-grey mt-2 pt-2">
                    @foreach ($months as $__month)
                    <div class="col-4 month-total">
                        <div class="fs-5 text-center text-muted">Expenditure</div>
                        <div>
                        <small>&pound;</small>{{ $__month->totalExpense() }}
                        </div>
                        <div class="fs-6">
                        Income <small>&pound;</small>{{ $__month->totalIncome() }}
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="pagination justify-content-between mt-3">
                    @if ($pagination['previous'] === null)
                    <a class="btn btn-sm btn-outline-primary disabled" href="" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                        Previous
                    </a>
                    @else
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('home', $pagination['previous']) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                        Previous
                    </a>
                    @endif

                    <a class="btn btn-sm btn-outline-primary" href="{{ route('home', $pagination['next']) }}">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>
                </div>

                {{--<div class="pagination justify-content-between mt-3">
                    @if ($pagination['previous'] === null)
                        <a class="btn btn-sm btn-outline-primary disabled" href="" aria-disabled="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Previous Quarter
                        </a>
                    @else
                        <a class="btn btn-sm btn-outline-primary" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Previous Quarter
                        </a>
                    @endif

                    <a class="btn btn-sm btn-outline-primary" href="">
                        Next Quarter
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>
                </div>--}}

                <div class="row">
                    <div class="col-12">
                        <h2 class="display-6 mt-5">Definitions</h2>
                    </div>
                    <div class="col-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="badge text-bg-income">Income</span>
                                This is your income, this is what pays your expenses
                            </li>
                            <li class="list-group-item">
                                <span class="badge text-bg-fixed">Fixed</span>
                                Expenses that are fixed and cannot be changed
                            </li>
                            <li class="list-group-item">
                                <span class="badge text-bg-flexible">Flexible</span>
                                Expenses that can change and aren't strictly necessary
                            </li>
                            <li class="list-group-item">
                                <span class="badge text-bg-savings text-white">Savings</span>
                                Top up the savings account, the more the better
                            </li>
                        </ul>
                    </div>
                </div>
            </main>

            <x-requests />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

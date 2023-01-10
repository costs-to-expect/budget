<div class="budget">
    @if ($has_accounts && $has_budget)
    <div class="row">
        <div class="col-12">
            <h2 class="display-5 mt-3 mb-3">Your Budget</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4 mb-2">
            <div class="btn-group" role="group">
                <button class="btn btn-sm btn-dark @if ($has_paid_items === false) disabled @endif" type="button" name="toggle-paid" id="toggle-paid" title="Toggle visibility of paid budget items" @if ($has_paid_items === false) disabled="disabled" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                    Show/Hide Paid
                </button>
            </div>
        </div>
        <div class="col-12 col-md-8 mb-2">
            <div class="row">
                <div class="col-12">
                    <div class="input-group">
                        <input type="text" name="budget-filter" class="form-control form-control-sm" placeholder="Filter Budget overview.." title="Filter the Budget overview" />
                        <button class="btn btn-sm btn-dark" type="button" name="clear-filter" id="clear-filter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3 mb-3 text-end">
            <div class="btn-group" role="group">
                <a class="btn btn-sm btn-outline-primary @if(Route::is('budget.item.create-expense')) active @endif" href="{{ route('budget.item.create-expense') }}" title="Add a new expense budget item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    Expense
                </a>
                <a class="btn btn-sm btn-outline-primary @if(Route::is('budget.item.create-income')) active @endif" href="{{ route('budget.item.create-income') }}" title="Add a new income budget item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    Income
                </a>
                @if($has_savings_account)
                <a class="btn btn-sm btn-outline-primary @if(Route::is('budget.item.create-saving')) active @endif" href="{{ route('budget.item.create-saving') }}" title="Add a new saving budget item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    Saving
                </a>
                @endif

                <a class="btn btn-sm btn-outline-primary @if(Route::is('budget.account.create')) active @endif" href="{{ route('budget.account.create') }}" title="Add a new account">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    Account
                </a>
            </div>
        </div>
    </div>
    @endif

    @if ($has_budget)
    {{--Show the budget items--}}
    <div class="row mt-3">
        @php $counter = 0; @endphp
        @foreach ($months as $__month)
            @if ($__month->visible())
            <div class="col-4 @if($counter === 1) border-start border-end border-primary border-opacity-50 @endif @if($__month->now()) bg-light @endif">
                <div class="text-primary text-center month pb-2">{{ $__month->name() }}<br />{{  $__month->year() }}</div>
                <div class="row">
                    @foreach ($__month->items() as $__item)
                        <a href="{{ route(
                                'budget.item.view', [
                                    'item_id' => $__item->id(),
                                    'item-year' => $__month->year(),
                                    'item-month' => $__month->month(),
                                    'month'=>  $__month->month(),
                                    'year'=> $__month->year()
                                ]) }}" class="budget-item" data-item-name="{{ $__item->name() }}" @if($__month->now() === true && $__item->paid() === true) data-item-paid=true @endif>
                        <div class="col-12 expense @if ($active_item === $__item->id() && $__month->year() === $active_item_year && $__month->month() === $active_item_month) active shadow @endif" @if($__item->disabled() === true) title="Disabled expense" @endif>
                            <div class="name text-grey" title="{{ $__item->name() }}">
                                <p class="mb-1">
                                    {{ $__item->name() }}
                                </p>
                            </div>
                            <div class="progress @if($__month->now()) border border-grey border-1 @endif @if($__item->disabled() === true || ($__month->now() === true && $__item->paid() === true)) opacity-25 @endif">
                                <div class="progress-bar bg-{{ $__item->category() }}" role="progressbar" aria-label="" style="width: {{ $__item->progressBarPercentage() }}%"
                                     aria-valuenow="{{ $__item->progressBarPercentage() }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="row">
                                <div class="col-3" title="{{ $__item->accountName() }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front float-start mt-1" viewBox="0 0 16 16" style="color: {{ $__item->accountColor() }}">
                                        <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                        <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </div>
                                <div class="col-9 amount text-grey text-end"><small><x-currency :currency="$__item->currency()" /></small>{{ number_format($__item->amount(), 2) }}
                                    @if ($__item->disabled() === true)
                                        <small class="text-dark disabled-expense">(Disabled)</small>
                                    @endif
                                    @if ($__month->now() === true && $__item->paid() === true)
                                        <small class="text-dark paid-expense">(Paid)</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @php $counter++; @endphp
            @endif
        @endforeach
    </div>
    @endif

    @if ($has_budget)
    {{--Show the expenditure--}}
    <div class="row mt-2 pt-2" id="expenditure">
        @foreach ($months as $__month)
            @if ($__month->visible())
            <div class="col-4 month-totals">
                <h3 class="mb-1 mt-3">Outgoings</h3>
                @foreach ($__month->totalExpensePerAccount() as $account_total)
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h4 class="mb-0 pt-2">
                            {{ $account_total['name'] }}
                        </h4>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h5 class="mb-2">
                            <small><x-currency :currency="$__month->currency()" /></small>{{ number_format($account_total['total'], 2) }}
                        </h5>
                    </div>
                </div>
                @endforeach
                @if (count($__month->totalExpensePerAccount()) > 1)
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h4 class="mb-0 pt-2 total">
                            Total
                        </h4>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h5 class="mb-2 total">
                            <small><x-currency :currency="$__month->currency()" /></small>{{ number_format($__month->totalExpense(), 2) }}
                        </h5>
                    </div>
                </div>
                @endif

                <h3 class="mb-1 mt-5">Income</h3>
                @foreach ($__month->totalIncomePerAccount() as $account_total)
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h4 class="mb-0 pt-2">
                            {{ $account_total['name'] }}
                        </h4>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h5 class="mb-2">
                            <small><x-currency :currency="$__month->currency()" /></small>{{ number_format($account_total['total'], 2) }}
                        </h5>
                    </div>
                </div>
                @endforeach
                @if (count($__month->totalIncomePerAccount()) > 1)
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h4 class="mb-0 pt-2 total">
                                Total
                            </h4>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h5 class="mb-2 total">
                                <small><x-currency :currency="$__month->currency()" /></small>{{ number_format($__month->totalIncome(), 2) }}
                            </h5>
                        </div>
                    </div>
                @endif
            </div>
            @endif
        @endforeach
    </div>

    <div class="row">
        @foreach ($months as $__month)
            @if ($__month->visible())
            <div class="col-4 mt-3">
                <div class="progress">
                    @foreach ($__month->summary()['categories'] as $__category => $__summary)
                    <div class="progress-bar bg-{{ $__category }}" role="progressbar"
                         aria-label="{{ $__category }} percentage outgoings"
                         style="width: {{ $__summary['percentage'] }}%"
                         aria-valuenow="{{ $__summary['percentage'] }}"
                         aria-valuemin="0"
                         aria-valuemax="{{ $__summary['percentage'] }}"
                         title="{{ $__category }} {{ $__summary['percentage'] }}% ">
                        @if ($__summary['percentage'] > 15) {{ $__summary['percentage'] }}% @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
    </div>
    @endif

    @if ($has_budget)
    {{--Pagination for the budget--}}
    <div id="pagination" class="pagination justify-content-between mt-4">
        <div>
        @if ($pagination['previous'] === null)
            <a class="btn btn-sm btn-outline-primary px-1 py-0 disabled" href="" aria-disabled="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Previous
            </a>
        @else
            <a class="btn btn-sm btn-outline-primary px-1 py-0"
               href="{{ route(
                    $pagination['selected']['item'] === null ? 'home' : 'budget.item.view' ,
                    [
                        'item_id' => $pagination['selected']['item'],
                        'item-year' => $pagination['selected']['year'],
                        'item-month' => $pagination['selected']['month'],
                        ...$pagination['previous'],
                        '#pagination'
                    ]
                ) }}" title="Go back one month">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Previous
            </a>
            <a class="btn btn-sm btn-outline-primary px-1 py-0"
               href="{{ route(
                    $pagination['selected']['item'] === null ? 'home' : 'budget.item.view' ,
                    [
                        'item_id' => $pagination['selected']['item'],
                        'item-year' => $pagination['selected']['year'],
                        'item-month' => $pagination['selected']['month'],
                        '#pagination'
                    ]
                ) }}" title="Go to today">
                Go to Today
            </a>
        @endif
        </div>

        <a class="btn btn-sm btn-outline-primary px-1 py-0"
           href="{{ route(
                    $pagination['selected']['item'] === null ? 'home' : 'budget.item.view' ,
                    [
                        'item_id' => $pagination['selected']['item'],
                        'item-year' => $pagination['selected']['year'],
                        'item-month' => $pagination['selected']['month'],
                        ...$pagination['next'],
                        '#pagination'
                    ]
                ) }}" title="Go forward one month">
            Next
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </a>
    </div>
    @endif

    @if ($has_budget === false)
        <div class="row mt-3 p-3">
            <div class="alert alert-dark" role="alert">

                @if ($has_accounts === false)
                    <h4 class="alert-heading">Let's Get Started!</h4>
                    <p class="lead">To get started select "Start" below. We will ask you to create your
                        first account and select the currency you would like use.</p>

                    <h4 class="alert-heading">I Want To See Budget In Action</h4>

                    <p class="lead">If you would like to see how everything works, select "Load Demo", We will
                        create a Demo Budget in your currency of choice and you can explore how our Apps works.</p>

                    <p class="lead">When you are comfortable, you can adopt the demo or reset your account and start afresh.</p>
                @else
                    <h4 class="alert-heading">Start Building Your Budget!</h4>
                    <p class="lead">
                        Start by inputting your expenses. We’ll give you projections for the months ahead.
                        It's that easy. Keep track of your budget and build your savings.
                    </p>

                    <h4 class="alert-heading">Savings?</h4>

                    <p class="lead">If you want to project your savings, you will need to add a savings account.</p>
                @endif
            </div>
            <p class="mb-0">
                @if ($has_accounts)
                    <a class="btn btn-sm btn-outline-primary @if(Route::is('budget.item.create-expense')) active @endif" href="{{ route('budget.item.create-expense') }}" title="Add a new expense budget item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Expense
                    </a>
                    <a class="btn btn-sm btn-outline-primary @if(Route::is('budget.item.create-income')) active @endif" href="{{ route('budget.item.create-income') }}" title="Add a new income budget item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Income
                    </a>
                    @if($has_savings_account)
                    <a class="btn btn-sm btn-outline-primary @if(Route::is('budget.item.create-saving')) active @endif" href="{{ route('budget.item.create-saving') }}" title="Add a new saving budget item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Saving
                    </a>
                    @endif

                    <a class="btn btn-sm btn-outline-primary @if(Route::is('budget.account.create')) active @endif" href="{{ route('budget.account.create') }}" title="Add a new account">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Account
                    </a>
                @else
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('start') }}" title="Start creating your Budget">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
                            <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z"/>
                            <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z"/>
                        </svg>
                        Start
                    </a>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('demo') }}" title="Load the demo budget">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-easel" viewBox="0 0 16 16">
                            <path d="M8.5 6a.5.5 0 1 0-1 0h-2A1.5 1.5 0 0 0 4 7.5v2A1.5 1.5 0 0 0 5.5 11h.473l-.447 1.342a.5.5 0 1 0 .948.316L7.027 11H7.5v1a.5.5 0 0 0 1 0v-1h.473l.553 1.658a.5.5 0 1 0 .948-.316L10.027 11h.473A1.5 1.5 0 0 0 12 9.5v-2A1.5 1.5 0 0 0 10.5 6h-2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-2z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                        </svg>
                        Load Demo
                    </a>
                @endif
            </p>
        </div>
    @endif

    @if ($has_accounts)
    {{--Show the balances and projections--}}
    <div class="row mt-3 budget-projections">
        <div class="col-12">
            <h2 class="display-6 mt-3 mb-3">Balances & Projections</h2>

            <div class="row">
                @foreach ($accounts as $__account)
                <div class="col-12 border-bottom border-light pb-3 mb-3 budget-projections">
                    <h4 class="mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front ms-1" viewBox="0 0 16 16" style="color: {{ $__account->color() }}">
                            <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                            <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        {{ $__account->name() }}
                    </h4>
                    <div class="row">
                        <div class="col-6 balance">
                            <p class="mb-0">The current <br />account balance</p>
                            <small><x-currency :currency="$__account->currency()" /></small>{{ number_format($__account->balance(), 2) }}
                        </div>
                        @if ($projection === true)
                        <div class="col-6 balance text-end">
                            <p class="mb-0">Projected balance end<br />
                                {{ $view_end['month'] . ' ' . $view_end['year'] }}</p>
                            <small><x-currency :currency="$__account->currency()" /></small>{{ number_format($__account->projected(), 2) }}
                        </div>
                        @else
                        <div class="col-6 balance text-end">
                            <p class="mb-0">Project balance<br />not available</p>
                            <small><x-currency :currency="$__account->currency()" /></small>{{ number_format($__account->balance(), 2) }}
                        </div>
                        @endif
                        <div class="col-12">
                            <a class="btn btn-sm btn-outline-primary px-1 py-0" href="{{ route('budget.account.update', ['account_id' => $__account->id()]) }}" title="Set balance for {{ $__account->name() }}">
                                Set Balance
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{--<div class="col-6">
            <h3>Today</h3>
            <p class="text-muted mb-1">Your balances as of today</p>

            @foreach ($accounts as $__account)
            <div class="balance">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front ms-1" viewBox="0 0 16 16" style="color: {{ $__account->color() }}">
                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                    <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <small>{{ $__account->name() }}</small>
                <br />
                <x-currency :currency="$__account->currency()" />{{ number_format($__account->balance(), 2) }}

            </div>
            @endforeach
        </div>--}}
        {{--<div class="col-6 text-end">
            <h3>{{ $view_end['month'] }}</h3>

            @if ($projection === true)
            <p class="text-muted mb-1">Projection to end of {{ $view_end['month'] . ' ' . $view_end['year'] }}</p>

            @foreach ($accounts as $__account)
            <div class="balance">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('budget.account.update', ['account_id' => $__account->id()]) }}" title="Set balance for {{ $__account->name() }}">
                    Edit Account
                </a>
                <br />
                <x-currency :currency="$__account->currency()" /></small>{{ number_format($__account->projected(), 2) }}
            </div>
            @endforeach
            @else
                <p class="text-muted mb-1">We can't show a Budget projection, you are reviewing your history.</p>
            @endif
        </div>--}}
        <div class="col-12 mt-2 text-end">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('budget.account.create') }}" title="Add a new account">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                New Account
            </a>
        </div>
    </div>
    @endif

    @if($has_accounts)
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
    @endif
</div>

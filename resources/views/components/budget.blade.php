<div class="budget">
    <div class="row">
        <div class="col-12">
            <h2 class="display-6 mt-3 mb-3">Your Budget</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('budget.item.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                New
            </a>
        </div>
    </div>

    <div class="row">
        @foreach ($months as $__month)
            <div class="col-4 @if($loop->index === 1) border-start border-end border-primary border-opacity-50 @endif">
                <div class="text-primary month pb-2">{{ $__month->name() }}</div>
                <div class="row">
                    @foreach ($__month->items() as $__item)
                        <a href="{{ route('budget.item.view', ['item_id' => str()->slug($__item->name())]) }}">
                        <div class="col-12 expense @if ($active === true && $__item->name() === 'Netflix' && $__month->name() === 'October') active shadow @endif">
                            <div class="name text-grey">{{ $__item->name() }}</div>
                            <div class="progress">
                                <div class="progress-bar bg-{{ $__item->category() }}" role="progressbar" aria-label="" style="width: {{ $__item->progressBarPercentage() }}%"
                                     aria-valuenow="{{ $__item->progressBarPercentage() }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="amount text-grey"><small>&pound;</small>{{ $__item->amount() }}</div>
                        </div>
                        </a>
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

    <div class="row mt-3 balances">
        <div class="col-12">
            <h2 class="display-6 mt-3 mb-3">Your Balances</h2>
        </div>
        <div class="col-6">
            <h3>Start
            </h3>
            <div class="balance">
                <a class="btn btn-sm btn-primary" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </a>
                <small>Default &pound;</small>500.0
            </div>
            <div class="balance">
                <a class="btn btn-sm btn-primary" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </a>
                <small>Savings &pound;</small>0.00
            </div>
        </div>
        <div class="col-6 text-end">
            <h3>Projected</h3>
            <div class="balance">
                <small>Default &pound;</small>1500.00
            </div>
            <div class="balance">
                <small>Savings &pound;</small>2546.0
            </div>
        </div>
        <div class="col-12 mt-2">
            <a class="btn btn-sm btn-primary" href="{{ route('budget.item.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                New Account
            </a>
        </div>
    </div>

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
</div>
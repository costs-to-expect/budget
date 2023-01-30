    <div class="row mt-2 pt-2" id="expenditure">
        @foreach ($months as $__month)
            @if ($__month->visible())
            <div class="col-4 month-totals">
                <h3 class="mb-1 mt-3">
                    Expenses
                    @if ($__month->now())
                        Due
                    @endif
                </h3>
                @if ($__month->now() === false)
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
                @else
                    @foreach ($__month->totalUnpaidExpensePerAccount() as $account_total)
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
                @endif
                @if (count($__month->totalExpensePerAccount()) > 1)
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h4 class="mb-0 pt-2 total">
                            Total expenses
                        </h4>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h5 class="mb-2 total">
                            <small><x-currency :currency="$__month->currency()" /></small>@if ($__month->now() === false){{ number_format($__month->totalExpense(), 2) }}@else{{ number_format($__month->totalUnpaidExpense(), 2) }}@endif
                        </h5>
                    </div>
                </div>
                @endif

                <h3 class="mb-1 mt-5">
                    Income
                    @if ($__month->now())
                        Due
                    @endif
                </h3>
                @if ($__month->now() === false)
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
                @else
                    @foreach ($__month->totalUnpaidIncomePerAccount() as $account_total)
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
                @endif
                @if (count($__month->totalIncomePerAccount()) > 1)
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h4 class="mb-0 pt-2 total">
                                Total income
                            </h4>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h5 class="mb-2 total">
                                <small><x-currency :currency="$__month->currency()" /></small>@if ($__month->now() === false){{ number_format($__month->totalIncome(), 2) }}@else{{ number_format($__month->totalUnpaidIncome(), 2) }}@endif
                            </h5>
                        </div>
                    </div>
                @endif
            </div>
            @endif
        @endforeach
    </div>

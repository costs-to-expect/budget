<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Budget Item</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-8 mx-auto p-3">

            <div class="row">
                <div class="col-12 col-lg-5 mx-auto p-2">
                    <div class="row budget-item g-3">
                        <div class="col-12">
                            <h2 class="display-5 mt-3 mb-3">
                                Budget Item
                            </h2>
                        </div>

                        @if ($action === null && $item_month === $now_month && $item_year === $now_year)
                            <div class="col-12">
                                @if ($is_paid === false)
                                    <div class="alert alert-dark mt-2" role="alert">
                                        <h4 class="alert-heading">Mark as Paid</h4>
                                        <p>When you mark this budget item as paid, your projection will
                                            immediately be updated.</p>

                                        <p>Your current balance needs to be updated each time you sign-in
                                            in order to ensure our projections are accurate.</p>
                                        <hr>

                                        <form action="{{ route('budget.item.set-as-paid.process', ['item_id' => $item['id']]) }}" method="POST" class="row g-2">
                                            @csrf

                                            <input type="hidden" name="year" value="{{ $now_year }}"/>
                                            <input type="hidden" name="month" value="{{ $now_month }}"/>

                                            <div class="col-12 mt-2">
                                                <button type="submit" class="btn btn-sm btn-dark">Mark as Paid</button>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="alert alert-dark mt-2" role="alert">
                                        <h4 class="alert-heading">Mark as Unpaid</h4>
                                        <p>If you have marked this budget item as paid in error, you can reset it by clicking the "Mark as Unpaid" button below.</p>
                                        <hr>

                                        <form action="{{ route('budget.item.set-as-not-paid.process', ['item_id' => $item['id']]) }}" method="POST" class="row g-2">
                                            @csrf

                                            <input type="hidden" name="year" value="{{ $now_year }}"/>
                                            <input type="hidden" name="month" value="{{ $now_month }}"/>

                                            <div class="col-12 mt-2">
                                                <button type="submit" class="btn btn-sm btn-dark">Mark as Unpaid</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if ($action === 'adjust' && $item_month !== null && $item_year !== null)
                        <div class="col-12">
                            <div class="alert alert-dark mt-2" role="alert">
                                <h4 class="alert-heading">Adjust</h4>
                                <p>You can adjust the amount of this budget item for <strong>{{ $adjust_date }}</strong>
                                    using the form below. Your projection will immediately update to reflect the
                                    adjustment.</p>
                                <hr>

                                <form action="{{ route('budget.item.adjust.process', ['item_id' => $item['id'], 'item_year' => $item_year, 'item_month' => $item_month]) }}" method="POST" class="row g-2">

                                    @csrf

                                    <div class="col-6">
                                        <label for="amount" class="form-label">Adjusted Amount</label>
                                        <input type="number" class="form-control form-control-sm @error('amount') is-invalid @enderror to-fixed" id="amount" name="amount" required="required" placeholder="10.99" min="0" step="0.01" value="{{ old('amount', (($adjusted_amount === null) ? $item['amount'] : number_format($adjusted_amount, 2, '.', ''))) }}" data-points="2">
                                        @error('amount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-sm btn-dark">Save</button>
                                        <a href="{{ route('budget.item.view', ['item_id' => $item['id']]) }}" class="btn btn-sm btn-outline-primary">Cancel</a>
                                    </div>
                                </form>

                                @if ($adjusted_amount !== null)
                                <form action="{{ route('budget.item.reset.process', ['item_id' => $item['id'], 'item_year' => $item_year, 'item_month' => $item_month]) }}" method="POST" class="row g-2 mt-3">
                                    @csrf
                                    <h4 class="alert-heading">Reset</h4>

                                    <p>Reset the budget item to the original amount of <strong><small><x-currency :currency="$item['currency']" /></small>{{ $item['amount'] }}</strong>.</p>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-sm btn-dark">
                                            Reset to <x-currency :currency="$item['currency']" />{{ $item['amount'] }}
                                        </button>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                        @endif

                        <x-budget-item :accounts="$accounts" :item="$item" :itemYear="$item_year" :itemMonth="$item_month" :adjustedAmount="$adjusted_amount" />

                        <div class="col-12">
                            <div class="btn-group" role="group">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('home') }}">
                                    Back
                                </a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('budget.item.update', ['item_id' => $item['id']]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                    Edit
                                </a>
                                @if ((int) $item['disabled'] === 0)
                                <a class="btn btn-sm btn-outline-dark" href="{{ route('budget.item.confirm-disable', ['item_id' => $item['id']]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                    </svg>
                                    Disable
                                </a>
                                @else
                                <a class="btn btn-sm btn-outline-dark" href="{{ route('budget.item.confirm-enable', ['item_id' => $item['id']]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun" viewBox="0 0 16 16">
                                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                    </svg>
                                    Enable
                                </a>
                                @endif
                                <a class="btn btn-sm btn-outline-danger" href="{{ route('budget.item.confirm-delete', ['item_id' => $item['id']]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 p-2">
                    <x-budget
                        :accounts="$accounts"
                        :months="$months"
                        :pagination="$pagination"
                        :viewEnd="$view_end"
                        :projection="$projection"
                        :hasAccounts="$has_accounts"
                        :hasBudget="$has_budget"
                        :active_item="$item['id']"
                        :active_item_year="$item_year"
                        :active_item_month="$item_month" />
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
        <script src="{{ asset('js/auto-format-numbers.js') }}" defer></script>
    </body>
</html>

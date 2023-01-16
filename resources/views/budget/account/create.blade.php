<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Add Account</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-10 col-xl-9 mx-auto p-3">

            <div class="row">
                <div class="col-12 col-lg-5 mx-auto p-2">
                <form action="{{ route('budget.account.create') }}" method="POST" class="row g-2">

                    @csrf

                    <div class="col-12">
                        <h2 class="display-5 mt-3 mb-3">New Account</h2>
                    </div>
                    <div class="col-6 col-md-6">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required="required" placeholder="Debit">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6 col-md-6">
                        <label for="type" class="form-label">Account Type *</label>
                        <select id="type" name="type" class="form-select form-select-sm @error('type') is-invalid @enderror">
                            <option value="expense" @if (old('type') === 'expense') selected="selected" @endif>Expense</option>
                            <option value="savings" @if (old('type') === 'savings') selected="selected" @endif>Savings</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description" placeholder="An optional description of the account">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4 col-md-4">
                        <label for="currency_id" class="form-label">Currency *</label>
                        <select id="currency_id" name="currency_id" class="form-select form-select-sm @error('currency_id') is-invalid @enderror" required="required">
                            <option value="{{ $currency['id'] }}" selected="selected">{{ $currency['code'] }} - <x-currency :currency="$currency" /></option>
                        </select>
                        @error('currency_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4 col-md-4">
                        <label for="balance" class="form-label">Balance *</label>
                        <input type="number" class="form-control form-control-sm @error('balance') is-invalid @enderror to-fixed" id="balance" name="balance" required="required" placeholder="10.99" min="0" step="0.01" value="{{ old('balance') }}" data-points="2">
                        @error('balance')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4 col-md-4">
                        <label for="color" class="form-label">Colour *</label>
                        <input type="color" class="form-control form-control-sm form-control-color" id="color" name="color" value="{{ old('color', $color) }}" title="Choose a colour for the account">
                        @error('color')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 text-muted small">Fields marked with an asterisk * are required.</div>
                    @if (count($accounts) < $max_accounts)
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-sm btn-dark" title="Add new account">Save</button>
                        <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary" title="Return to your Budget">Cancel</a>
                    </div>
                    @endif

                    @if (count($accounts) === $max_accounts)
                        <div class="col-12 mt-3">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary" title="Return to your Budget">Cancel</a>
                        </div>
                    @endif
                </form>

                <div class="p-2">
                    <div class="alert alert-primary fade show mt-3" role="alert">
                        <h4 class="alert-heading">Budget Pro! <small>Coming soon(tm)</small></h4>
                        <p>In Budget Pro there is no limit to the number of accounts you can add.</p>
                        <p>You have created <strong>{{ count($accounts) }}</strong>, the maximum for Budget is <strong>{{ $max_accounts }}</strong>.</p>
                        <p>Additionally, in Budget Pro your Budget can include multiple currencies.</p>
                        <hr>
                        <p class="mb-0"><a href="{{ route('version-compare') }}" title="Compare Budget to Budget Pro">Find out more</a>.</p>
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
                        :hasSavingsAccount="$has_savings_account"
                        :hasPaidItems="$has_paid_items"
                        :nowVisible="$now_visible" />
                </div>
            </div>

            <x-requests :requests="$requests" />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
        <script src="{{ asset('js/auto-format-numbers.js') }}" defer></script>
        <script src="{{ asset('js/filter-budget.js') }}" defer></script>
        <script src="{{ asset('js/toggle-paid.js') }}" defer></script>
    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Set Balances</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-10 col-xl-9 mx-auto p-3">
            <div class="row">
                <div class="col-12 col-lg-5 mx-auto p-2">
                    <form action="" method="POST" class="row g-2">

                        @csrf

                        <div class="col-12">
                            <h2 class="display-5 mt-3 mb-3">Set account balances</h2>
                        </div>

                        @foreach ($accounts as $__account)
                        <fieldset>
                            <legend class="col-form-label col-12 text-primary">{{ $__account->name() }}</legend>
                            <div class="col-12">
                                <p class="lead">Set the current balance for the account, the balance
                                    should be what is currently in the bank.</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <label for="{{ $__account->id() }}" class="form-label">Balance Today *</label>
                                <input type="number" class="form-control form-control-sm @error($__account->id()) is-invalid @enderror to-fixed" id="{{ $__account->id() }}" name="{{ $__account->id() }}" required="required" placeholder="10.99" min="0" step="0.01" value="{{ old('balance', number_format($__account->balance(), 2, '.', '')) }}" data-points="2">
                                @error($__account->id())
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        @endforeach

                        <div class="col-12 text-muted small">Fields marked with an asterisk * are required.</div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-sm btn-dark" title="Save changes to account">Save</button>
                            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary" title="Return to Your Budget">Cancel</a>
                        </div>
                    </form>

                    <div class="p-2">
                        <div class="alert alert-primary fade show mt-3" role="alert">
                            <h4 class="alert-heading">Budget Pro! <small>Coming soon(tm)</small></h4>
                            <p>In Budget Pro you will be able to have more than {{ $max_accounts }} accounts.</p>
                            <p>You have created {{ count($accounts) }} accounts.</p>
                            <p>Additional, in Budget Pro your Budget can include multiple currencies.</p>
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

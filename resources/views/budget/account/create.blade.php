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

        <div class="col-lg-8 mx-auto p-3">

            <div class="col-12 col-md-6 col-lg-5 mx-auto p-2">
                <form action="{{ route('budget.account.create') }}" method="POST" class="row g-2">

                    @csrf

                    <div class="col-12">
                        <h2 class="display-6">New account</h2>
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
                            <option value="expense" selected="selected">Expense</option>
                            <option value="savings">Savings</option>
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
                    <div class="col-6 col-md-6">
                        <label for="currency_id" class="form-label">Currency *</label>
                        <select id="currency_id" name="currency_id" class="form-select form-select-sm @error('currency_id') is-invalid @enderror" required="required">
                            <option value="{{ $currency['id'] }}" selected="selected">{{ $currency['code'] . '-' . $currency['name'] }}</option>
                        </select>
                        @error('currency_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6 col-md-6">
                        <label for="balance" class="form-label">Balance *</label>
                        <input type="number" class="form-control form-control-sm @error('balance') is-invalid @enderror" id="balance" name="balance" required="required" placeholder="10.99" min="0" step="0.01" value="{{ old('balance') }}">
                        @error('balance')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <a href="{{ route('home') }}" class="btn btn-dark">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-12 text-muted">Fields marked with an asterisk * are required.</div>
                </form>

                <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                    <h4 class="alert-heading">Budget Pro!</h4>
                    <p>In Budget Pro you can have more than three accounts.</p>
                    <p>In Budget Pro your Budget can include multiple currencies.</p>
                    <hr>
                    <p class="mb-0"><a href="">Find out more</a>.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <x-budget
                    :accounts="$accounts"
                    :months="$months"
                    :pagination="$pagination"
                    :viewEnd="$view_end"
                    :active="false"
                    :projection="$projection "/>

            <x-requests />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

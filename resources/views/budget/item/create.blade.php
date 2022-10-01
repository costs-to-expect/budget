<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Create Expense or Income</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-10 col-xl-9 mx-auto p-3">

            <div class="row">
                <div class="col-12 col-lg-4 mx-auto p-2">
                    <form action="{{ route('budget.item.create.process') }}" method="POST" class="row g-2">

                        @csrf

                        <div class="col-12">
                            <h2 class="display-6 mt-3 mb-3">New</h2>
                        </div>
                        <div class="col-6 col-md-6">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control form-control-sm <x-validation-error field='name' />" id="name" name="name" value="{{ old('name') }}" placeholder="Rent">
                            <x-validation-error-message field="name" />
                        </div>
                        <div class="col-6 col-md-6">
                            <label for="account" class="form-label">Account *</label>
                            <select id="account" name="account" class="form-select form-select-sm">
                                @foreach ($accounts as $__account)
                                    <option value="{{ $__account->id() }}" @if (old('account') !== null && old('account') === $__account->id()) selected="selected" @endif>{{ $__account->name() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control form-control-sm" id="description" name="description" placeholder="An optional description of the expense/income"></textarea>
                        </div>
                        <div class="col-6 col-md-6">
                            <label for="start_date" class="form-label">Start Date *</label>
                            <input type="date" class="form-control form-control-sm <x-validation-error field='start_date' />" id="start_date" name="start_date" value="">
                            <x-validation-error-message field="start_date" />
                        </div>
                        <div class="col-6 col-md-6">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control form-control-sm" id="end_date" name="end_date" value="">
                        </div>
                        <div class="col-4 col-md-4">
                            <label for="currency_id" class="form-label">Currency *</label>
                            <select id="currency_id" name="currency_id" class="form-select form-select-sm @error('currency_id') is-invalid @enderror" required="required">
                                <option value="{{ $currency['id'] }}" selected="selected">{{ $currency['code'] . '-' . $currency['name'] }}</option>
                            </select>
                        </div>
                        <div class="col-4 col-md-4">
                            <label for="amount" class="form-label">Amount *</label>
                            <input type="number" class="form-control form-control-sm" id="amount" name="amount" placeholder="10.99">
                        </div>
                        <div class="col-4 col-md-4">
                            <label for="item_type" class="form-label">Type *</label>
                            <select id="item_type" name="item_type" class="form-select form-select-sm">
                                <optgroup label="Expense">
                                    <option selected="selected">Fixed</option>
                                    <option>Flexible</option>
                                    @if ($has_savings_account)
                                    <option>Savings</option>
                                    @endif
                                </optgroup>
                                <optgroup label="Income">
                                    <option selected="selected">Income</option>
                                </optgroup>
                            </select>
                        </div>
                        <fieldset>
                            <legend class="col-form-label col-12 text-primary">Frequency *</legend>
                            <p>Set how often the expense should appear on your Budget.</p>
                            <div class="col-12">
                                <label for="frequency" class="form-label">Repeats *</label>
                                <select id="frequency" name="frequency" class="form-select form-select-sm">
                                    <option value="monthly" selected="selected">Monthly</option>
                                    <option value="annually">Annually</option>
                                    <option value="never">Never/One off</option>
                                </select>
                            </div>
                            <p class="mt-2 text-primary">You have selected monthly, please choose the day of the month it
                                typically occurs, this is just a guide.</p>
                            <div class="col-6">
                                <label for="day" class="form-label">Day of Month</label>
                                <input type="number" class="form-control form-control-sm" id="day" name="day" placeholder="5">
                            </div>
                        </fieldset>

                        {{--<fieldset>
                            <legend class="col-form-label col-12 text-primary">Frequency</legend>
                            <p>Set how often the expense should appear on your budget.</p>
                            <div class="col-12">
                                <label for="frequency" class="form-label">Repeats *</label>
                                <select id="frequency" name="frequency" class="form-select form-select-sm">
                                    <option value="Monthly" selected="selected">Monthly</option>
                                    <option value="Annually">Annually</option>
                                </select>
                            </div>
                            <p>You have selected annually, please choose the day and month this
                                typically occurs, this is just a guide.</p>
                            <div class="row">
                                <div class="col-6">
                                    <label for="day" class="form-label">Day</label>
                                    <input type="number" class="form-control form-control-sm" id="day" name="day" placeholder="5">
                                </div>
                                <div class="col-6">
                                    <label for="amount" class="form-label">Month</label>
                                    <select id="frequency" name="frequency" class="form-select form-select-sm">
                                        <option value="Monthly" selected="selected">Month.</option>
                                        <option value="Monthly">Jan.</option>
                                        <option value="Monthly">Feb.</option>
                                        <option value="Monthly">Mar.</option>
                                        <option value="Monthly">Apr.</option>
                                        <option value="Monthly">May.</option>
                                        <option value="Monthly">Jun.</option>
                                        <option value="Monthly">Jul.</option>
                                        <option value="Monthly">Aug.</option>
                                        <option value="Monthly">Sep.</option>
                                        <option value="Monthly">Oct.</option>
                                        <option value="Monthly">Nov.</option>
                                        <option value="Monthly">Dec.</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="col-form-label col-12 text-primary">Frequency</legend>
                            <p>Set how often the expense should appear on your budget.</p>
                            <div class="col-12">
                                <label for="frequency" class="form-label">Repeats *</label>
                                <select id="frequency" name="frequency" class="form-select form-select-sm">
                                    <option value="Monthly" selected="selected">Monthly</option>
                                    <option value="Annually">Annually</option>
                                </select>
                            </div>
                            <p>You have selected Never/One off, please choose the day and month this
                                for this budget item.</p>
                            <div class="row">
                                <div class="col-6">
                                    <label for="day" class="form-label">Day</label>
                                    <input type="number" class="form-control form-control-sm" id="day" name="day" placeholder="5" min="1" max="31" step="1">
                                </div>
                                <div class="col-6">
                                    <label for="amount" class="form-label">Month</label>
                                    <select id="frequency" name="frequency" class="form-select form-select-sm">
                                        <option value="Monthly" selected="selected">Month.</option>
                                        <option value="Monthly">Jan.</option>
                                        <option value="Monthly">Feb.</option>
                                        <option value="Monthly">Mar.</option>
                                        <option value="Monthly">Apr.</option>
                                        <option value="Monthly">May.</option>
                                        <option value="Monthly">Jun.</option>
                                        <option value="Monthly">Jul.</option>
                                        <option value="Monthly">Aug.</option>
                                        <option value="Monthly">Sep.</option>
                                        <option value="Monthly">Oct.</option>
                                        <option value="Monthly">Nov.</option>
                                        <option value="Monthly">Dec.</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>--}}

                        <fieldset>
                            <legend class="col-form-label col-12 text-primary">Exclusions</legend>
                            <p>Select any months when the expense <strong>should not</strong> appear on your
                                budget, for example, you may not pay Council Tax in January & February.</p>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            January
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            February
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            March
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            April
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            May
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            June
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            July
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            August
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            September
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            October
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            November
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="exclude" name="exclude" value="1">
                                        <label class="form-check-label" for="exclude">
                                            December
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="col-12 text-muted small">Fields marked with an asterisk * are required.</div>
                        <div class="col-12 mt-3">

                            @if (count($accounts) > 0)
                            <a href="{{ route('home') }}" class="btn btn-dark">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                            @else
                            <div class="alert alert-dark show mt-2" role="alert">
                                <h4 class="alert-heading">No accounts!</h4>
                                <p>You can't add a Budget item until you have added at least account, please create an account.</p>
                                <hr>
                                <p class="mb-0"><a href="{{ route('budget.account.create') }}">New account</a>.</p>
                            </div>
                            @endif
                        </div>
                    </form>

                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                        <h4 class="alert-heading">Budget Pro!</h4>
                        <p>In Budget Pro we include additional frequency options, daily, weekly, fortnights etc.</p>
                        <p>Additionally, we have more complicated exclusion options.</p>
                        <hr>
                        <p class="mb-0"><a href="">Find out more</a>.</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <div class="col-12 col-lg-8 p-2">
                    <x-budget
                        :accounts="$accounts"
                        :months="$months"
                        :pagination="$pagination"
                        :viewEnd="$view_end"
                        :active="false"
                        :projection="$projection "/>
                </div>
            </div>

            <x-requests />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

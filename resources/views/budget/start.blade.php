<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Start</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-10 col-xl-9 mx-auto p-3">
            <div class="col-12 mx-auto p-2">

                <div class="alert alert-dark mt-2" role="alert">
                    <h4 class="alert-heading">Let's Begin</h4>
                    <p class="lead">
                        Setting up your Budget is simple. Start by inputting an account and the balance.</p>
                    <p class="lead">When this is complete you can start creating your Budget.</p>

                    <form action="{{ route('start.process') }}" method="POST" class="row g-2">

                        @csrf

                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required="required" placeholder="Debit">
                            <input type="hidden" name="type" value="expense" />
                            @error('name')
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
                        <div class="col-4">
                            <label for="currency_id" class="form-label">Currency *</label>
                            <select id="currency_id" name="currency_id" class="form-select form-select-sm @error('currency_id') is-invalid @enderror" required="required">
                                @foreach ($currencies as $__currency)
                                    <option value="{{ $__currency['id'] }}" @if (old('currency_id') !== null && old('currency_id') === $__currency['id']) selected="selected" @endif>{{ $__currency['code'] }} - <x-currency :currency="$__currency" /></option>
                                @endforeach
                            </select>
                            @error('currency_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-4">
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
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-sm btn-primary" title="Create my budget">
                                Save
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary" title="Cancel, don't create budget">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            <x-help />

            <x-requests :requests="$requests" />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
        <script src="{{ asset('js/auto-format-numbers.js') }}" defer></script>
    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Load Demo</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-8 col-xl-6 mx-auto p-3">

            <div class="col-12 mx-auto p-2">

                <h2 class="display-5 mt-3 mb-3">Let's Begin</h2>

                <p class="lead">To load the demo, click the "Load" button below.</p>

                <p class="lead">It will take us a minute or two, please bear with us whilst we set everything up.</p>

                @if ($loading === true)
                <p class="lead text-primary demo-loading">
                    <span class="spinner-border" role="status">
                        <span class="visually-hidden">Loading the demo data...</span>
                    </span>
                    We are loading the data now, as soon as we are done we will let you know.
                    Everything should be ready in less than a minute.
                </p>
                @endif

                <form action="{{ route('demo.process') }}" method="POST" class="row g-2">

                    @csrf

                    @if ($loading === false)

                    <div class="col-12 col-md-6">
                        <label for="currency_id" class="form-label">Your Currency</label>
                        <select id="currency_id" name="currency_id" class="form-select form-select-sm @error('currency_id') is-invalid @enderror" required="required" aria-describedby="currency_idHelpBlock">
                            @foreach ($currencies as $__currency)
                                <option value="{{ $__currency['id'] }}" @if (old('currency_id') !== null && old('currency_id') === $__currency['id']) selected="selected" @endif>{{ $__currency['code'] }} - <x-currency :currency="$__currency" /></option>
                            @endforeach
                        </select>
                        <div id="currency_idHelpBlock" class="form-text">Please choose the currency for your Budget, GBP, USD, EUR, CAD, AUD, NZD & INR.</div>
                        @error('currency_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-sm btn-primary" title="Load demo budget data">
                            Load
                        </button>
                        <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary" title="Cancel, don't load demo data">Cancel</a>
                    </div>
                    @endif
                </form>

                @if ($loading === true)
                <p class="lead text-primary d-none continue-to-demo">
                    We're done! Click the "Continue" button to start exploring.
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('home') }}" title="Go to Your Budget">
                        Continue
                    </a>
                </p>
                @endif
            </div>

            <x-requests :requests="$requests" />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
        @if ($loading === true)
        <script src="{{ asset('node_modules/axios/dist/axios.js') }}" defer></script>
        <script src="{{ asset('js/is-demo-loaded.js') }}" defer></script>
        @endif
    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Load Demo</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-10 col-xl-9 mx-auto p-3">
            <div class="col-12 mx-auto p-2">

                <div class="alert alert-dark mt-2" role="alert">
                    <h4 class="alert-heading">Demo</h4>
                    <p class="lead">To load the demo, click the button below.</p>
                    <p class="lead">It will take us a minute or two to load the demo, please bear with
                        us whilst we set everything up.</p>

                    <hr>

                    <form action="" method="POST" class="row g-2">

                        @csrf

                        <div class="col-12 mt-3">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">
                                Load Demo
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <x-requests />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

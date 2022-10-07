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

                    @if ($loading === true)
                    <p class="lead text-primary">
                        We are loading the Demo data, as soon as we are done we will let you know,
                        everything should be ready within a minute or so.
                    </p>

                    <p class="lead text-primary d-none continue-to-demo">
                        We have loaded the demo, click the button to start playing with App.
                        <a class="btn btn-sm btn-primary" href="{{ route('home') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
                                <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z"/>
                                <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z"/>
                            </svg>
                            Begin
                        </a>
                    </p>
                    @else
                    <hr>
                    @endif

                    <form action="{{ route('demo.process') }}" method="POST" class="row g-2">

                        @csrf

                        @if ($loading === false)

                        <div class="col-12 mt-3">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">
                                Load Demo
                            </button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>

            <x-requests />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
        @if ($loading === true)
        <script src="{{ asset('node_modules/axios/dist/axios.js') }}" defer></script>
        <script src="{{ asset('js/is-demo-loaded.js') }}" defer></script>
        @endif
    </body>
</html>

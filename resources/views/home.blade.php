<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
    <meta name="author" content="Dean Blackborough">
    <title>Budget: Home</title>
    <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
</head>
<body>
<div class="col-lg-8 mx-auto p-3 py-md-5">

    <div class="header">
        <h1 class="display-1">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" width="64" height="64" alt="Costs to Expect Logo" title="Powered by the Costs to Expect API">
            </a>
            Budget
        </h1>
    </div>

    <nav class="nav nav-fill my-4 border-bottom border-top">
        <a class="nav-link active" href="{{ route('home') }}">Home</a>
        <a class="nav-link" href="{{ route('sign-out') }}">Sign-out</a>
    </nav>

    <main>

        <h2>Content</h2>

    </main>
    <footer class="pt-4 my-4 text-muted border-top text-center">
        Created by <a href="https://twitter.com/DBlackborough">Dean Blackborough</a><br />
        powered by the <a href="https://api.costs-to-expect.com">Costs to Expect API</a>

        <div class="mt-3 small">
            v{{ $config['version'] }} - Released {{ $config['release_date'] }}
        </div>
    </footer>
</div>
</body>
</html>

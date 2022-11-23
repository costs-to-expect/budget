<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Budgeting by Costs to Expect">
    <meta name="author" content="Dean Blackborough">
    <title>Budget by Costs to Expect</title>

    <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    <meta name="theme-color" content="#892b7c">
    <x-open-graph />
    <x-twitter-card />
    <style>
        .text-bg-dark a {
            font-weight: 700;
        }
        .container {
            max-width: 960px;
        }

        .site-header {
            background-color: #000000;
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            backdrop-filter: saturate(180%) blur(20px);
        }
    </style>
</head>
<body>

<header class="site-header sticky-top py-1">
    <nav class="container-fluid d-flex flex-column flex-md-row navbar-dark">
        <a class="navbar-brand p-0 me-0 me-lg-2" href="{{ route('landing') }}" aria-label="Budget by Costs to Expect">
            <img src="{{ asset('images/logo.png') }}" alt="Costs to Expect Logo" width="40" height="40" title="Costs to Expect" />
        </a>
        <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
            <li class="nav-item px-1">
                <a class="nav-link py-2 px-0 px-lg-2" href="{{ route('getting-started') }}">Getting Started</a>
            </li>
            <li class="nav-item px-1">
                <a class="nav-link py-2 px-0 px-lg-2" href="{{ route('workflow') }}">Workflow</a>
            </li>
            <li class="nav-item px-1">
                <a class="nav-link py-2 px-0 px-lg-2" href="{{ route('version-compare') }}">Versions</a>
            </li>
            <li class="nav-item px-1">
                <a class="nav-link py-2 px-0 px-lg-2" href="{{ route('faqs') }}">FAQs</a>
            </li>
        </ul>
    </nav>
</header>

<main>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-6 p-lg-6 mx-auto my-5">
            <h1 class="display-4 fw-normal">Budget</h1>
            <h2 class="display-5">A budgeting tool so easy to use, it’s child play!</h2>
            <p class="lead fw-normal">A free, open source budgeting tool powered by the
                <a href="https://github.com/costs-to-expect/api">Costs to Expect API</a>.</p>
            <p class="lead fw-normal"><span class="badge rounded-pill text-bg-income">Beta</span> Official release due at the start of January 2023.</p>
            <p class="text-muted"><small>You are free to register now but there may be a bug or two until the official release.</small></p>
            <a href="{{ route('register.view') }}" class="btn btn-outline-primary" title="Register an account with Costs to Expect">Register</a>
            <a href="{{ route('sign-in.view') }}" class="btn btn-outline-primary" title="Sign in with your Costs to Expect account">Sign-in</a>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Simple</h2>
                <p class="lead">Our overview is so clear and simple, a child could manage your budget.
                    We wouldn’t recommend it, but you get the idea.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto"
                 style="width: 80%; height: 448px; border-radius: 6px 6px 0 0;">
                <img src="{{ asset('images/overview.png') }}" width="275" height="" alt="Budget overview screen, shows expenses for each month" />
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Projections</h2>
                <p class="lead">Simply input your income and outgoings to see projected balances and savings for the months
                    and years ahead. Handy, right?</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto"
                 style="width: 80%; height: 448px; border-radius: 6px 6px 0 0;">
                <img src="{{ asset('images/projections.png') }}" width="275" height="" alt="Budget overview screen, shows projections for each account" />
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Open Source</h2>
                <p class="lead"><a href="https://github.com/costs-to-expect/budget/blob/main/LICENSE">Budget</a> and the <a href="https://github.com/costs-to-expect/api/blob/master/LICENSE">API</a> are open source. That means we're not hiding anything -
                    you are always free to see how your data is transmitted and saved.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto"
                 style="width: 80%; height: 253px; border-radius: 6px 6px 0 0;">
                <img src="{{ asset('images/open-source.png') }}" width="256" height="" alt="Budget & the Costs to Expect API are Open Source, MIT License" />
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Powerful</h2>
                <p class="lead">The Costs to Expect <a href="https://github.com/costs-to-expect/api">API</a> is powerful - we designed it knowing we were going
                    to use it for a variety of different projects.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto"
                 style="width: 80%; height: 253px; border-radius: 6px 6px 0 0;">
                <img src="{{ asset('images/api.png') }}" width="256" height="" alt="The Costs to Expect API is powerful and powers all our Apps" />
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Detail</h2>
                <p class="lead">We only show you the data you need but behind the scenes we have all the detail,
                    expenses can be as complex as you like.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto"
                 style="width: 80%; height: 400px; border-radius: 6px 6px 0 0;">
                <img src="{{ asset('images/detail.png') }}" width="275" height="" alt="Budget detail screen, show expense details" />
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Exclusions</h2>
                <p class="lead">We understand that not all expenses are monthly - we provide the tools to set exclusions,
                    ensuring your budget is completely customisable and up-to-date.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto"
                 style="width: 80%; height: 400px; border-radius: 6px 6px 0 0;">
                <img src="{{ asset('images/exclusions.png') }}" width="275" height="" alt="Budget exclusions screen, show that monthly exclusions can be set for monthly expenses" />
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Your Data</h2>
                <p class="lead">You can use our app or access your data directly via the <a href="https://github.com/costs-to-expect/api">API</a>, we don't mind
                    how you use our tools.</p>
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Full Control</h2>
                <p class="lead">We hope it won't happen but if you want to leave us, it's easy and immediate. We provide
                    the tools to allow you to export and delete your data there and then.</p>
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Dogfooding</h2>
                <p class="lead">We're using our own products every day so if there's a feature that bugs you,
                    chances are we're already working on improvements.</p>
                <p class="text-muted small"><a href="https://en.wikipedia.org/wiki/Eating_your_own_dog_food">Dogfooding</a> on Wikipedia</p>
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Free</h2>
                <p class="lead">Simple budgeting should be <strong>free</strong>* and easy and our aim is to keep Budget free for as long
                    as we possibly can. The App is funded by the API and Budget Pro.</p>
                <p class="text-muted small">
                    *We reserve the right to change this if sheer number of users make this unviable for us (But we promise to do our best!)
                </p>
            </div>
        </div>
    </div>

</main>

<x-footer />

<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>

</body>
</html>

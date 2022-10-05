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
    <nav class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 text-center" href="{{ route('landing') }}" aria-label="Product">
            <img src="{{ asset('images/logo.png') }}" alt="Costs to Expect" width="48" height="48" />
        </a>
    </nav>
</header>

<main>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-6 p-lg-6 mx-auto my-5">
            <h1 class="display-4 fw-normal">Budget</h1>
            <h2 class="display-5">A budgeting tool so easy to use, it’s child play!</h2>
            <p class="lead fw-normal">A free, open source budgeting tool powered by the <a href="https://api.costs-to-expect.com">Costs to Expect API</a>.</p>
            <p class="lead fw-normal">In early development, we expect to have our v1.00.0 ready
                before spring 2023, our Beta will be ready before the end of the year.</p>
            <a class="btn btn-outline-primary"><span class="badge text-bg-income">Beta</span> Coming Soon </a>
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
                 style="width: 80%; height: 448px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/overview.png') }}" width="275" height="" alt="Budget overview screen, expense for each month" />
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Projections</h2>
                <p class="lead">Simply input your income and outgoings to see projected balances and savings for the months
                    and years ahead. Handy, right?</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto"
                 style="width: 80%; height: 448px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/projections.png') }}" width="275" height="" alt="Budget overview screen, expense for each month" />
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Open Source</h2>
                <p class="lead">Budget and the API powering it are open source. That means we're not hiding anything -
                    you are always free to see how your data is transmitted and saved.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto"
                 style="width: 80%; height: 335px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/open.png') }}" width="275" height="" alt="Budget & the Costs to Expect API are Open Source" />
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Powerful</h2>
                <p class="lead">The Costs to Expect API is incredibly powerful - we designed it knowing we were going
                    to use it for a variety of different tools.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto"
                 style="width: 80%; height: 335px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/api.png') }}" width="275" height="" alt="The Costs to Expect API powers all our Apps" />
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
                 style="width: 80%; height: 400px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/detail.png') }}" width="275" height="" alt="Budget overview screen, expense for each month" />
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Exclusions</h2>
                <p class="lead">We understand that not all expenses are monthly - we provide the tools to set exclusions,
                    ensuring your budget is completely customisable and up-to-date.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto"
                 style="width: 80%; height: 400px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/exclusions.png') }}" width="275" height="" alt="Budget overview screen, expense for each month" />
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Your Data</h2>
                <p class="lead">You can use our app or access your data directly via the API, we don't mind
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
                <p class="lead">Simple budgeting should be free* and easy and our aim is to keep Budget free for as long
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

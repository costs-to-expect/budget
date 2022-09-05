<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Budgeting by Costs to Expect">
    <meta name="author" content="Dean Blackborough">
    <title>Budget: Costs to Expect</title>

    <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    <meta name="theme-color" content="#892b7c">
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
        <a class="py-2 text-center" href="https://api.costs-to-expect.com" aria-label="Product">
            <img src="{{ asset('images/logo.png') }}" alt="Costs to Expect" width="48" height="48" />
        </a>
    </nav>
</header>

<main>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">Budget</h1>
            <p class="lead fw-normal">A free, open source budgeting tool<br />
                powered by the <a href="https://api.costs-to-expect.com">Costs to Expect API</a>.</p>
            <p class="lead fw-normal">In early development, we expect to have our v1.00.0 ready
                before spring 2023, our Beta will be ready before the end of the year.</p>
            <a class="btn btn-outline-primary"><span class="badge text-bg-income">Beta</span> Coming Soon </a>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Simple</h2>
                <p class="lead">Our overview is so
                    easy to understand a child could manage your budgeting, we wouldn't
                    suggest it, but they could.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto"
                 style="width: 80%; height: 500px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/budget.png') }}" width="275" height="" alt="Budget overview screen, expense for each month" />
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Projections</h2>
                <p class="lead">At a glance projections, no matter what you are doing, a projection is always
                    available for each of your accounts.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto"
                 style="width: 80%; height: 500px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/projections.png') }}" width="275" height="" alt="Budget overview screen, expense for each month" />
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Open Source</h2>
                <p class="lead">Budget and the API it uses are open source, we aren't hiding anything, you
                    are free to see how your data is transmitted and saved.</p>
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Powerful</h2>
                <p class="lead">The Costs to Expect API is incredibly powerful, we designed it knowing
                    we were going to use it for a variety of different tools.</p>
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Detail</h2>
                <p class="lead">We only show you the data you need but behind the scenes we
                    have all the detail, expenses can be as complex as you like.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto"
                 style="width: 80%; height: 470px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/item-detail.png') }}" width="275" height="" alt="Budget overview screen, expense for each month" />
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Exclusions</h2>
                <p class="lead">We provide the tools to set exclusions, all expenses aren't monthly,
                    do you want to set when an expense shouldn't appear on the budget?.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto"
                 style="width: 80%; height: 470px; border-radius: 21px 21px 0 0;">
                <img src="{{ asset('images/exclusions.png') }}" width="275" height="" alt="Budget overview screen, expense for each month" />
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Your Data</h2>
                <p class="lead">You can use our app or access your data directly via the API,
                    we don't mind how you use our tools.</p>
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Full Control</h2>
                <p class="lead">If you want to leave, no worries, we provide the tools to let you
                    export and delete your data immediately, no waiting.</p>
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Simple</h2>
                <p class="lead">The first thing you see is a simple overview of your expenses, our overview is so
                    easy to understand a child could manage your budgeting, we wouldn't
                    suggest it, but they could.</p>
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Free</h2>
                <p class="lead">Free forever*, simple budgeting should be free and easy, this app will be free
                    for as long as possible, Budget is funded by the API and Budget Pro.</p>
                <p class="text-muted small">
                    *We can't see into the future so we reserve the right to change this if necessary.
                </p>
            </div>
        </div>
    </div>

</main>

<x-footer />

<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>

</body>
</html>

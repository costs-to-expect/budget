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
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/product/">
    <meta name="theme-color" content="#892b7c">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
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
            <p class="lead fw-normal">A free open source budgeting tool<br />
                powered by the Costs to Expect API.</p>
            <p class="lead fw-normal">In early development, we expect to be ready later this year.</p>
            <a class="btn btn-outline-primary">Coming Soon</a>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Simple to use</h2>
                <p class="lead">So simple to use your child could manage your budgeting, we wouldn't
                    suggest it, but they could.</p>
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Free</h2>
                <p class="lead">Free forever, simple budgeting should be free and easy, this app will always
                    be free. We have a pro version in the works if you need more powerful tools.</p>
            </div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Open Source</h2>
                <p class="lead">THis app and the API it uses are open source, we aren't hiding anything, you
                    are free to see how your data is transmitted and saved.</p>
            </div>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Powerful</h2>
                <p class="lead">THe Costs to Expect API is incredible powerful, we designed it knowing
                    we were going to use it for a variety of different tools.</p>
            </div>
        </div>
    </div>

</main>

<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted">&copy; 2022</small>
        </div>
        <div class="col-6 col-md">
            <h5>Powered by the API</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-secondary" href="https://www.costs-to-expect.com">Social Experiment</a></li>
                <li><a class="link-secondary" href="#">Yahtzee Game Scorer</a></li>
                <li><a class="link-secondary" href="#">Yatzy Game Scorer (Coming soon)</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Costs to Expect</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-secondary" href="https://api.costs-to-expect.com">The API</a></li>
                <li><a class="link-secondary" href="https://github.com/costs-to-expect">GitHub</a></li>
                <li><a class="link-secondary" href="https://www.deanblackborough.com">Dean Blackborough</a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>

</body>
</html>

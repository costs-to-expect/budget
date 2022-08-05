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

        <div class="row">
            <div class="col-12">
                <h2 class="display-6 mt-4">Your Budget</h2>
            </div>
        </div>

        <div class="row text-primary">
            <div class="col-4 month">Aug.</div>
            <div class="col-4 month">Sep.</div>
            <div class="col-4 month">Oct.</div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-12 expense">
                        <div class="name text-light">Gas & Electric</div>
                        <div class="progress">
                            <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light">&pound;275</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-light">Guitar Lessons</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light">&pound;50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-light">Holiday Savings</div>
                        <div class="progress">
                            <div class="progress-bar bg-savings" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light">&pound;150</div>
                    </div>
                </div>
            </div>
            <div class="col-4 border-start border-end border-primary border-opacity-50">
                <div class="row">
                    <div class="col-12 expense">
                        <div class="name text-light">Gas & Electric</div>
                        <div class="progress">
                            <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light"><small>&pound;</small>275</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-light">Guitar Lessons</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light"><small>&pound;</small>50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-light">Holiday Savings</div>
                        <div class="progress">
                            <div class="progress-bar bg-savings" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light"><small>&pound;</small>150</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-light">TV, Phone & Internet</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light"><small>&pound;</small>50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-light">School Uniform</div>
                        <div class="progress">
                            <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light"><small>&pound;</small>50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-light">Netflix</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light"><small>&pound;</small>16.99</div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-12 expense">
                        <div class="name text-light">Gas & Electric</div>
                        <div class="progress">
                            <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light"><small>&pound;</small>275</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-light">Guitar Lessons</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light"><small>&pound;</small>50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-light">Holiday Savings</div>
                        <div class="progress">
                            <div class="progress-bar bg-savings" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-light"><small>&pound;</small>150</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-primary mt-2 pt-2">
            <div class="col-4 month-total"><small>&pound;</small>475</div>
            <div class="col-4 month-total"><small>&pound;</small>591.99</div>
            <div class="col-4 month-total"><small>&pound;</small>475</div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <h2 class="display-6 mt-4">Definitions</h2>
            </div>
            <div class="col-12">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="badge text-bg-fixed">Fixed</span>
                        Expenses that are fixed and cannot be changed
                    </li>
                    <li class="list-group-item">
                        <span class="badge text-bg-flexible">Flexible</span>
                        Expenses that can change and aren't strictly necessary
                    </li>
                    <li class="list-group-item">
                        <span class="badge text-bg-savings text-white">Savings</span>
                        Top up the savings account, the more the better
                    </li>
                </ul>
            </div>
        </div>

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

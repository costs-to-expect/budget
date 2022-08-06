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

<nav class="navbar navbar-dark bg-dark" aria-label="Offcanvas navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            Budget by <img src="{{ asset('images/logo.png') }}" width="30" height="30" class="d-inline-block align-middle" alt=""><span class="d-none">C</span>osts to Expect.com
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel">Budget</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('sign-out') }}">Sign-out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="col-lg-8 mx-auto p-3">

    <main class="budget">
        <div class="row">
            <div class="col-12">
                <h2 class="display-6">Your Budget</h2>
            </div>
        </div>

        <div class="row text-primary pb-2">
            <div class="col-4 month">Aug.</div>
            <div class="col-4 month">Sep.</div>
            <div class="col-4 month">Oct.</div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-12 expense">
                        <div class="name text-grey">Gas & Electric</div>
                        <div class="progress">
                            <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey">&pound;275</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-grey">Guitar Lessons</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey">&pound;50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-grey">Holiday Savings</div>
                        <div class="progress">
                            <div class="progress-bar bg-savings" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey">&pound;150</div>
                    </div>
                </div>
            </div>
            <div class="col-4 border-start border-end border-primary border-opacity-50">
                <div class="row">
                    <div class="col-12 expense">
                        <div class="name text-grey">Gas & Electric</div>
                        <div class="progress">
                            <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey"><small>&pound;</small>275</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-grey">Guitar Lessons</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey"><small>&pound;</small>50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-grey">Holiday Savings</div>
                        <div class="progress">
                            <div class="progress-bar bg-savings" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey"><small>&pound;</small>150</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-grey">TV, Phone & Internet</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey"><small>&pound;</small>50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-grey">School Uniform</div>
                        <div class="progress">
                            <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey"><small>&pound;</small>50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-grey">Netflix</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey"><small>&pound;</small>16.99</div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-12 expense">
                        <div class="name text-grey">Gas & Electric</div>
                        <div class="progress">
                            <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey"><small>&pound;</small>275</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-grey">Guitar Lessons</div>
                        <div class="progress">
                            <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey"><small>&pound;</small>50</div>
                    </div>

                    <div class="col-12 expense">
                        <div class="name text-grey">Holiday Savings</div>
                        <div class="progress">
                            <div class="progress-bar bg-savings" role="progressbar" aria-label="" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="amount text-grey"><small>&pound;</small>150</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-grey mt-2 pt-2">
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
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
</body>
</html>

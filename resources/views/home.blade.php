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
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

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
                                    <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 50%"
                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="amount text-grey">&pound;275</div>
                            </div>

                            <div class="col-12 expense">
                                <div class="name text-grey">Guitar Lessons</div>
                                <div class="progress">
                                    <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%"
                                         aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="amount text-grey">&pound;50</div>
                            </div>

                            <div class="col-12 expense">
                                <div class="name text-grey">Holiday Savings</div>
                                <div class="progress">
                                    <div class="progress-bar bg-savings" role="progressbar" aria-label="" style="width: 25%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 50%"
                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="amount text-grey"><small>&pound;</small>275</div>
                            </div>

                            <div class="col-12 expense">
                                <div class="name text-grey">Guitar Lessons</div>
                                <div class="progress">
                                    <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%"
                                         aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="amount text-grey"><small>&pound;</small>50</div>
                            </div>

                            <div class="col-12 expense">
                                <div class="name text-grey">Holiday Savings</div>
                                <div class="progress">
                                    <div class="progress-bar bg-savings" role="progressbar" aria-label="" style="width: 25%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="amount text-grey"><small>&pound;</small>150</div>
                            </div>

                            <div class="col-12 expense">
                                <div class="name text-grey">TV, Phone & Internet</div>
                                <div class="progress">
                                    <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 25%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="amount text-grey"><small>&pound;</small>50</div>
                            </div>

                            <div class="col-12 expense">
                                <div class="name text-grey">School Uniform</div>
                                <div class="progress">
                                    <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 25%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="amount text-grey"><small>&pound;</small>50</div>
                            </div>

                            <div class="col-12 expense">
                                <div class="name text-grey">Netflix</div>
                                <div class="progress">
                                    <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%"
                                         aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <div class="progress-bar bg-fixed" role="progressbar" aria-label="" style="width: 50%"
                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="amount text-grey"><small>&pound;</small>275</div>
                            </div>

                            <div class="col-12 expense">
                                <div class="name text-grey">Guitar Lessons</div>
                                <div class="progress">
                                    <div class="progress-bar bg-flexible" role="progressbar" aria-label="" style="width: 10%"
                                         aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="amount text-grey"><small>&pound;</small>50</div>
                            </div>

                            <div class="col-12 expense">
                                <div class="name text-grey">Holiday Savings</div>
                                <div class="progress">
                                    <div class="progress-bar bg-savings" role="progressbar" aria-label="" style="width: 25%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

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

        <x-offcanvas active="account"/>

        <div class="col-lg-8 mx-auto p-3">

            <main>
                <h2>Your account</h2>

                <p class="load">Manage your account details below.</p>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Name</strong>: {{ $user['name'] }}
                    </li>
                    <li class="list-group-item">
                        <strong>Email</strong>: {{ $user['email'] }}
                    </li>
                </ul>

                <h3 class="mt-5">Delete 'Budget' account</h3>

                <p class="lead">This will delete all your Budgets and any other data specific to the
                    Budget App.</p>

                <p>Please review the tables below to see what will be deleted and what will remain.</p>

                <h4>Data that will be deleted</h4>

                <p>All the data listed in this table will be deleted.</p>

                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">Content</th>
                            <th scope="col">Description</th>
                            <th scope="col">Location</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Budgets</td>
                            <td>All your budgets</td>
                            <td>API</td>
                        </tr>
                        <tr>
                            <td>Related data</td>
                            <td>Categories, limits, ranges, anything related to your budgets</td>
                            <td>Budget & API</td>
                        </tr>
                        <tr>
                            <td>Logs</td>
                            <td>Recorded changes for undo etc.</td>
                            <td>API</td>
                        </tr>
                        <tr>
                            <td>Sessions</td>
                            <td>Session information</td>
                            <td>Budget</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <h4>Data that will be not deleted</h4>

                <p>All the data listed in this table will remain.</p>

                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">Content</th>
                            <th scope="col">Description</th>
                            <th scope="col">Location</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Account</td>
                            <td>Your Costs to Expect account, one account for all our Apps</td>
                            <td>API</td>
                        </tr>
                        <tr>
                            <td>Other App data</td>
                            <td>Your will still have access to all the other Costs to Expect Apps and
                                none of your data will be touched</td>
                            <td>API & Relevant Apps</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <a href="#" class="btn btn-sm btn-danger disabled" disabled="disabled">Delete Budget Account (Coming soon(tm))</a>

                <h3 class="mt-5">Delete Costs to Expect account</h3>

                <p class="lead">This will delete your Costs to Expect account and accounts in all
                    our other Apps, Budget, Expense, Yatzy, Yahtzee etc.</p>

                <p>Please review the table below to see what will be deleted, nothing will remain.</p>

                <h4>Data that will be deleted</h4>

                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">Content</th>
                            <th scope="col">Description</th>
                            <th scope="col">Location</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Account</td>
                            <td>Your Costs to Expect account</td>
                            <td>API</td>
                        </tr>
                        <tr>
                            <td>Data</td>
                            <td>All the data we have stored will be deleted</td>
                            <td>API & all our Apps</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <a href="#" class="btn btn-sm btn-danger disabled" disabled="disabled" >Delete Account (Coming Soon(tm))</a>
            </main>

            <x-requests />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

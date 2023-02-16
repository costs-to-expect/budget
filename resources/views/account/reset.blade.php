<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Reset Account</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="account.reset"/>

        <div class="col-lg-8 col-xl-6 mx-auto p-3">

            <main>
                 <h2 class="display-5">Reset Budget</h2>

                <p class="lead">If you reset your account, the Budget you have created and any related data
                    will be permanently deleted. Use this if you want to start afresh.</p>

                <p class="lead">If you have been playing with your demo, the reset options allows you to
                    start again.</p>

                <h4>Data that will be permanently deleted</h4>

                <p>We will instantly delete all the data listed in the following table.</p>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr class="bg-dark text-light">
                            <th scope="col">Data type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Data location</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Budget</td>
                            <td>Your Budget and all budget items</td>
                            <td>API</td>
                        </tr>
                        <tr>
                            <td>Related data</td>
                            <td>Paid budget item states and adjusted budget item values</td>
                            <td>Budget</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <h4>Data that will be not deleted</h4>

                <p>We will not touch any of the data detailed in the following table.</p>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr class="bg-dark text-light">
                            <th scope="col">Data type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Data location</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Account</td>
                            <td>Your Costs to Expect account, you use one account across all our Apps</td>
                            <td>API</td>
                        </tr>
                        <tr>
                            <td>Other Apps</td>
                            <td>Your will still have access to all the Costs to Expect Apps and
                                none of your data in our other apps will be affected.</td>
                            <td>API & Relevant Apps</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-danger mt-2" role="alert">
                    <h4 class="alert-heading">Reset</h4>
                    <p>If you are sure you want to reset your account, confirm below.</p>
                    <p>This action cannot be undone.</p>
                    <p>It will take a few seconds to process the request, you will be signed out.</p>
                    <hr>

                    <form action="{{ route('account.reset.process') }}" method="POST" class="row g-2">

                        @csrf

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-sm btn-danger" title="Confirm reset request">Reset</button>
                            <a href="{{ route('account.index') }}" class="btn btn-sm btn-outline-primary" title="Return to Your Account">Cancel</a>
                        </div>
                    </form>
                </div>
            </main>

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

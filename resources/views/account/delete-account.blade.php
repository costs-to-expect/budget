<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Delete Account</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="account.delete-account"/>

        <div class="col-lg-8 col-xl-6 mx-auto p-3">

            <main>
                <h2 class="display-5">Delete Account</h2>

                <p class="lead">This will permanently delete your Costs to Expect account. All your data
                    will be removed across our entire service. Please review the following table to see what will be
                    deleted, nothing will remain.</p>

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
                            <td>Your Costs to Expect account</td>
                            <td>API</td>
                        </tr>
                        <tr>
                            <td>API</td>
                            <td>All your data</td>
                            <td>API</td>
                        </tr>
                        <tr>
                            <td>Budget Pro</td>
                            <td>Any data that exists</td>
                            <td>Budget Pro</td>
                        </tr>
                        <tr>
                            <td>Budget</td>
                            <td>Any data that exists</td>
                            <td>Budget</td>
                        </tr>
                        <tr>
                            <td>Yahtzee</td>
                            <td>Any data that exists</td>
                            <td>Yahtzee</td>
                        </tr>
                        <tr>
                            <td>Yatzy</td>
                            <td>Any data that exists</td>
                            <td>Yatzy</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-danger mt-2" role="alert">
                    <h4 class="alert-heading">Delete Account</h4>
                    <p>If you are sure you want to delete your account, confirm below.</p>
                    <p>This action cannot be undone.</p>
                    <p>It will take a few seconds to process the request, you will be signed out.</p>
                    <hr>

                    <form action="{{ route('account.delete-account.process') }}" method="POST" class="row g-2">

                        @csrf

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-sm btn-danger" title="Confirm delete account request">Delete</button>
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

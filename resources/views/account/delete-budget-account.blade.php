<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Delete Budget Account</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="account.delete-budget-account"/>

        <div class="col-lg-8 mx-auto p-3">

            <main>
                <h2 class="display-4">Delete Budget Account</h2>

                <p class="lead">This will delete your Budget account and all the data within it. If you are
                    using any of our other Apps, those Apps will not be affected.</p>

                <h3 class="display-6">Data that will be deleted</h3>

                <p>All the data listed in the following table will be deleted.</p>

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
                            <td>Your Budget and budget items</td>
                            <td>API</td>
                        </tr>
                        <tr>
                            <td>Budget Account</td>
                            <td>Your Budget account</td>
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

                <h3 class="display-6">Data that will be not deleted</h3>

                <p>All the data listed in the following table will remain.</p>

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
                    <h4 class="alert-heading">Delete Budget Account</h4>
                    <p>If you are sure you want to delete your Budget account, confirm below.</p>
                    <p>This action cannot be undone.</p>
                    <p>It will take a few seconds to process the request, you will be signed out.</p>
                    <hr>

                    <form action="{{ route('account.delete-budget-account.process') }}" method="POST" class="row g-2">

                        @csrf

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-sm btn-danger" title="Confirm delete request">Delete</button>
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

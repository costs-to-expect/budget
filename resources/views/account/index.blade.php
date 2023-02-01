<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Manage Account</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="account"/>

        <div class="col-lg-8 mx-auto p-3">

            <main>
                <h2 class="display-5 mt-3 mb-3">Account Overview</h2>

                <p class="lead">From here you can update and manage your account. If you need to
                    update your profile or set a new password, check below, if you want to delete your
                    account or reset the App, check the relevant section below, <em>you have full control over
                    your data</em>.
                </p>

                <h3>Profile & Password</h3>

                <p class="lead">Change your name or email using the "Update Profile" button, if you
                    want or need to set a new password, use the "Change Password" button.</p>

                @if ($status === 'password-changed')
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Password Changed!</h4>
                        <p>Your password has been changed.</p>
                        <p class="mb-0">Don't forgot, you will need to use the new password across all our Apps,
                            you have one account for the entire Costs to Expect service.</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($status === 'profile-updated')
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Profile Updated!</h4>
                        <p>Your name and/or email address has been changed.</p>
                        <p class="mb-0">Don't forgot, if you changed your email, you will need to use the new
                            email across all our Apps, you have one account for the entire Costs to Expect service.</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item">
                        <strong>Name</strong>: {{ $user['name'] }}
                    </li>
                    <li class="list-group-item">
                        <strong>Email</strong>: {{ $user['email'] }}
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('account.update-profile') }}" class="btn btn-sm btn-outline-primary">Update Profile</a>
                        <a href="{{ route('account.change-password') }}" class="btn btn-sm btn-outline-primary">Change Password</a>
                    </li>
                </ul>

                <h3 class="mt-5">Reset Budget</h3>

                <p class="lead">You can reset your Budget account using the option below. All data related to
                    Budget will be permanently deleted, use this if you want to start afresh.</p>

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

                <a href="{{ route('account.reset') }}" class="btn btn-sm btn-outline-danger" title="Go to reset confirmation screen">Request Reset</a>


                <h3 class="mt-5">Delete Budget Account</h3>

                <p class="lead">This will permanently delete your Budget account and all the data within it.
                    If you are using any of our other Apps, those Apps will not be affected.</p>

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

                <a href="{{ route('account.delete-budget-account') }}" class="btn btn-sm btn-outline-danger" title="Go to delete budget account confirmation screen">Request Budget Account Deletion</a>

                <h3 class="mt-5">Delete Account</h3>

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

                <a href="{{ route('account.delete-account') }}" class="btn btn-sm btn-outline-danger" title="Go to delete account confirmation screen">Request Account Deletion</a>
            </main>

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

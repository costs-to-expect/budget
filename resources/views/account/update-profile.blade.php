<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Update Profile</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
    </head>
    <body>
        <x-offcanvas active="account.update-profile"/>

        <div class="col-lg-8 col-xl-6 mx-auto p-3">

            <div class="row">
                <div class="col-12">
                    <h2 class="display-5 mt-3 mb-3">Update Profile</h2>

                    <p class="lead">You can change your email address and name using the form below. Changes will
                        affect all Apps in the Costs to Expect service.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 pt-2 pb-5">
                    <h4 class="alert-heading">Name & Email</h4>

                    <p class="lead">Update your name or email address.</p>

                    <form action="{{ route('account.update-profile.process') }}" method="POST" class="row g-2">

                        @csrf

                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control <x-validation-error field='email' />" id="email" aria-describedby="email-help" required value="{{ old('email', $user['content']['email']) }}" />
                            <div id="email-help" class="form-text">Your email address, update if necessary.</div>
                            <x-validation-error-message field="email" />
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control <x-validation-error field='name' />" id="name" aria-describedby="name-help" required value="{{ old('name', $user['content']['name']) }}" />
                            <div id="name-help" class="form-text">Your name, update if necessary.</div>
                            <x-validation-error-message field="name" />
                        </div>

                        <div class=col-12">
                            <button type="submit" class="btn btn-sm btn-dark" title="Save profile changes">Save</button>
                            <a href="{{ route('account.index') }}" class="btn btn-sm btn-outline-primary" title="Return to Your Account">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

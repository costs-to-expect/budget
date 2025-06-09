<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Let's get started with Budget, sign-in below">
        <meta name="author" content="Dean Blackborough">
        <title>Sign-in to Budget</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="Sign-in to Budget" description="Let's get started with Budget, sign in below" />
        <x-layout.twitter-card title="Sign-in to Budget" description="Let's get started with Budget, sign in below" />
    </head>
    <body>
        <x-layout.navbar activeRoute="landing" />

        <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <h1 class="mt-6 text-center text-6xl font-bold tracking-tight text-pinky-700">Budget</h1>
                <h2 class="mt-6 text-center text-3xl font-medium tracking-tight text-gray-700">Sign-in</h2>
                <p class="mt-2 text-center text-base text-gray-600">
                    Or
                    <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com" label="tryout Budget Pro." />
                </p>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="py-6 px-4 sm:px-10">
                    <form class="space-y-4" action="{{ route('sign-in.process') }}" method="POST">

                        @csrf

                        {{--<div>
                            <x-helper.form.field.email
                                    name="email"
                                    title="Email address"
                                    :required="true"
                                    :hasError="$errors !== null && array_key_exists('email', $errors)"
                                    :value="old('email')"
                            />
                            <p class="mt-2 text-sm text-gray-500">Please enter your email address</p>
                            <x-helper.form.api-error :errors="$errors['email'] ?? null" />
                        </div>

                        <div>
                            <x-helper.form.field.password
                                    name="password"
                                    title="Your password"
                                    :required="true"
                                    :hasError="$errors !== null && array_key_exists('password', $errors)"
                            />
                            <p class="mt-2 text-sm text-gray-500">Please enter your password</p>
                            <x-helper.form.api-error :errors="$errors['password'] ?? null" />
                        </div>--}}

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember_me" type="checkbox"
                                       class="h-4 w-4 rounded border-gray-300 text-pinky-600 focus:ring-pinky-500">
                                <label for="remember_me" class="ml-2 block text-base text-gray-900">Remember me</label>
                            </div>
                        </div>

                        <div class="flex justify-center space-x-4">
                            <button type="submit" value="submit" class="rounded-md border border-transparent
        px-1.5 py-1 md:px-2 md:py-1.5 text-base font-medium text-white shadow-sm bg-pinky-500 hover:bg-pinky-700">
                                Sign-in
                            </button>
                        </div>
                    </form>
                </div>

                <div class="py-6 px-4 sm:px-10">
                    <p class="text-sm text-gray-500">
                        By using Budget, you are agreeing to our 
                        <a href="{{ route('privacy-policy') }}">privacy policy</a>. Please read our privacy policy 
                        carefully before registering. In short, we <strong>do not</strong> track you and we 
                        <strong>will not</strong> share your data.
                    </p>
                    
                    <p class="mt-2 text-sm text-gray-500">
                        If you don't have an account with Costs to Expect, you can 
                        <a href="{{ route('register.view') }}">register</a> to get access to Budget and the 
                        entire Costs to Expect service.
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                        If you have forgotten your password, please use our
                        <a href="{{ route('forgot-password.view') }}">forgot password</a>
                        form and we will issue instructions on how to create a new password.
                    </p>
                </div>
            </div>
        </div>
        
        <x-layout.footer />
        
        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

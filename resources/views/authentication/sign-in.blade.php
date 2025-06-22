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
                    <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com" label="tryout Budget Pro." :external="true" />
                </p>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="py-6 px-4 sm:px-10">
                    <form class="space-y-4" action="{{ route('sign-in.process') }}" method="POST">

                        @csrf

                        <div>
                            <label for="email" class="block text-base font-medium text-gray-700">
                                Email <span class="text-lg">*</span>
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" required 
                                class="block w-full rounded-md border border-gray-300 px-3 py-2
                placeholder-gray-400 shadow-sm focus:border-pinky-500 focus:outline-none focus:ring-pinky-500 @if($errors !== null && array_key_exists('email', $errors)) border-red-500 ring-1 ring-red-500 @endif sm:text-sm"
                                       placeholder="email@email.com" value="{{ old('email') }}" />
                                <p class="mt-2 text-sm text-gray-500">Please enter your email address</p>
                                @if($errors !== null && array_key_exists('email', $errors) && is_array($errors['email']))
                                    @if (count($errors['email']['errors']) === 1)
                                        <p class="mt-2 text-sm text-red-500 pl-2">{{ $errors['email']['errors'][0] }}</p>
                                    @else
                                        <ul class="mt-2 text-sm text-red-500 list-disc pl-6">
                                            @foreach ($errors['email']['errors'] as $__error)
                                                <li>{{ $__error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-base font-medium text-gray-700">
                                Password <span class="text-lg">*</span>
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required 
                                class="block w-full sm:max-w-sm rounded-md border border-gray-300 px-3 py-2
                placeholder-gray-400 shadow-sm focus:border-pinky-500 focus:outline-none focus:ring-pinky-500 @if($errors !== null && array_key_exists('password', $errors)) border-red-500 ring-1 ring-red-500 @endif sm:text-sm" />
                                <p class="mt-2 text-sm text-gray-500">Please enter your password, <em>we will check this
                                        against the hashed value in our database</em>.</p>
                                @if($errors !== null && array_key_exists('password', $errors) && is_array($errors['password']))
                                    @if (count($errors['password']['errors']) === 1)
                                        <p class="mt-2 text-sm text-red-500 pl-2">{{ $errors['password']['errors'][0] }}</p>
                                    @else
                                        <ul class="mt-2 text-sm text-red-500 list-disc pl-6">
                                            @foreach ($errors['password']['errors'] as $__error)
                                                <li>{{ $__error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endif
                            </div>
                        </div>

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

                            <a href="{{ route('landing') }}" class="rounded-md border border-transparent
    bg-black px-1.5 py-1 md:px-2 md:py-1.5 text-base font-medium text-white shadow-sm hover:bg-gray-700">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>

                <div class="py-6 px-4 sm:px-10">
                    <p class="text-sm text-gray-500">
                        By using Budget, you are agreeing to our
                        <x-helper.control.link.text :route="route('privacy-policy')" label="privacy policy." />
                        Please read our privacy policy carefully before registering. In short, we 
                        <strong>do not</strong> track you and we <strong>will not</strong> share your data.
                    </p>
                    
                    <p class="mt-2 text-sm text-gray-500">
                        If you don't have an account with Costs to Expect, you can
                        <x-helper.control.link.text :route="route('register.view')" label="register" />
                        to get access to Budget and the entire Costs to Expect service.
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                        If you have forgotten your password, please use our
                        <x-helper.control.link.text :route="route('forgot-password.view')" label="forgot password" />
                        form and we will issue instructions on how to create a new password.
                    </p>
                </div>
            </div>
        </div>
        
        <x-layout.footer />
        
        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

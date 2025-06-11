<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Register with Budget to use our free budget calculator">
        <meta name="author" content="Dean Blackborough">
        <title>Register to Budget</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="Register to Budget" description="Register with Budget to use our free budget calculator" />
        <x-layout.twitter-card title="Register to Budget" description="Register with Budget to use our free budget calculator" />
    </head>
    <body>
        <x-layout.navbar activeRoute="landing" />

        <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <h1 class="mt-6 text-center text-6xl font-bold tracking-tight text-pinky-700">Budget</h1>
                <h2 class="mt-6 text-center text-3xl font-medium tracking-tight text-gray-700">Register</h2>
                <p class="mt-2 text-center text-base text-gray-600">
                    Or
                    <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com" label="tryout Budget Pro." />
                </p>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="py-6 px-4 sm:px-10">
                    <form class="space-y-4" action="{{ route('register.process') }}" method="POST">

                        @csrf

                        @if ($failed !== null)
                            <p class="text-sm text-red-500">
                                We were unable to create your account, the API returned the
                                following error "{{ $failed }}". Please check our
                                <x-helper.control.link.text route="https://status.costs-to-expect.com" label="status" />
                                page and try again later.
                            </p>
                        @endif

                        <div>
                            <label for="name" class="block text-base font-medium text-gray-700">
                                Name <span class="text-lg">*</span>
                            </label>
                            <div class="mt-1">
                                <input id="name" name="name" type="text" required
                                       class="block w-full rounded-md border border-gray-300 px-3 py-2
                placeholder-gray-400 shadow-sm focus:border-pinky-500 focus:outline-none focus:ring-pinky-500 @if($errors !== null && array_key_exists('name', $errors)) border-red-500 ring-1 ring-red-500 @endif sm:text-sm"
                                       placeholder="Your name" value="{{ old('name') }}" />
                                <p class="mt-2 text-sm text-gray-500">Please enter a name, <em>any name will do</em>.</p>
                                @if($errors !== null && array_key_exists('name', $errors) && is_array($errors['name']))
                                    @if (count($errors['name']['errors']) === 1)
                                        <p class="mt-2 text-sm text-red-500 pl-2">{{ $errors['name']['errors'][0] }}</p>
                                    @else
                                        <ul class="mt-2 text-sm text-red-500 list-disc pl-6">
                                            @foreach ($errors['name']['errors'] as $__error)
                                                <li>{{ $__error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endif
                            </div>
                        </div>

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
                        By registered with Budget, you are agreeing to our
                        <x-helper.control.link.text :route="route('privacy-policy')" label="privacy policy." />
                        Please read our privacy policy carefully before registering. In short, we 
                        <strong>do not</strong> track you and we <strong>will not</strong> share your data.
                    </p>
                   
                    <p class="mt-2 text-sm text-gray-500">
                        Budget is an Open Source project, if you have any doubts about our 
                        intentions or what we are doing with you data, please review
                        or ask someone you trust to review our code on 
                        <x-helper.control.link.text route="https://github.com/costs-to-expect" label="GitHub." />
                    </p>
                </div>
            </div>
        </div>
        
        <x-layout.footer />
        
        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Forgotten you Password? Let's help you create a new one and get back at it">
        <meta name="author" content="Dean Blackborough">
        <title>Forgotten your password? - Email on the way!</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="Forgotten your password? - Email on the way!" description="Forgotten you Password? Let's help you create a new one and get back at it" />
        <x-layout.twitter-card title="Forgotten your password? - Email on the way!" description="Forgotten you Password? Let's help you create a new one and get back at it" />
    </head>
    <body>
        <x-layout.navbar activeRoute="landing" />

        <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <h1 class="mt-6 text-center text-6xl font-bold tracking-tight text-pinky-700">Budget</h1>
                <h2 class="mt-6 text-center text-3xl font-medium tracking-tight text-gray-700">Email on the Way!</h2>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="py-6 px-4 sm:px-10">
                    <p class="text-xl text-gray-500">
                        We have emailed you, there should be an email in your
                        inbox soon containing a link, you can use this to create a new password.
                    </p>

                    <p class="mt-4 text-xl text-gray-500">
                        An email should arrive within the next couple of
                        minutes, if you don't see it, please check your spam or
                        trash.
                    </p>

                    <p class="mt-4 text-xl text-gray-500">
                        If you have any suggestions, reach out to us on 
                        <x-helper.control.link.text route="https://github.com/costs-to-expect/budget/issues" label="GitHub" />, 
                        we are always looking for help with improving our apps.
                    </p>
                </div>
            </div>
        </div>
        
        <x-layout.footer />
        
        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

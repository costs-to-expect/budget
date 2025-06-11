<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="This short article will show you how to add a savings budget item to your Budget?">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: How to add a savings budget item</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="Budget: How to add a savings budget item" description="This short article will show you how to add a savings budget item to your Budget?" />
        <x-layout.twitter-card title="Budget: How to add a savings budget item" description="This short article will show you how to add a savings budget item to your Budget?" />
    </head>
    <body>
        <x-layout.navbar activeRoute="features" />
        
        <div class="relative overflow-hidden bg-white py-16">
        
            <div class="relative px-6 lg:px-8">
                <div class="mx-auto max-w-prose text-lg">
                    <h1>
                        <span class="block text-center text-lg font-semibold text-pinky-700">How to use Budget</span>
                        <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-black sm:text-4xl">Add a savings budget item</span>
                    </h1>
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        To create a new savings budget item please follow the steps below.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">Step 1: Select Add Savings</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        From the Budget Overview select the add savings button, this will take you to the form, so 
                        you can add all the necessary details.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/savings/new-savings.png') }}" alt="Select the add savings button" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>
        
        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">Step 2: Choose account</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        Choose the account the savings should be deducted from, this will typically be your main 
                        debit or checking account.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/savings/choose-account.png') }}" alt="Choose the account" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>
        
        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">Step 3: Choose target account</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        Choose the target account, this is the account the savings will be transferred into. Our 
                        projections will allow you to see how your savings will grow over time.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/savings/choose-target-account.png') }}" alt="Choose savings account" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>
        
        <x-layout.footer />

        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

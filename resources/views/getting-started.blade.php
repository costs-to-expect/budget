<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="There are several ways to get started with Budget. Our Q&A tool helps you generate a budget or you can manually import your data using our budget item form">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Getting Started</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="Budget: Getting Started" description="There are several ways to get started with Budget. Our Q&A tool helps you generate a budget or you can manually import your data using our budget item form" />
        <x-layout.twitter-card title="Budget: Getting Started" description="There are several ways to get started with Budget. Our Q&A tool helps you generate a budget or you can manually import your data using our budget item form" />
    </head>
    <body>
        <x-layout.navbar activeRoute="features" />

        <div class="relative overflow-hidden bg-white py-16">
        
            <div class="relative px-6 lg:px-8">
                <div class="mx-auto max-w-prose text-lg">
                    <h1>
                        <span class="block text-center text-lg font-semibold text-pinky-700">Three steps until budgeting</span>
                        <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-black sm:text-4xl">Getting Started</span>
                    </h1>
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        Before you can follow the workflow, you need to get your Budget setup, you can 
                        do this manually, or you can load up our Demo and adjust it to your needs.

                        If you have your Budget setup, check-out our
                        <x-helper.control.link.text :route="route('workflow')" label="Workflow" /> page.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">Step 1: Add your accounts</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        Add any accounts you want Budget to track, we need a name and a starting balance. If you 
                        want to track your savings you can add savings accounts.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('/images/getting-started/add-an-account.png') }}" alt="Add your accounts" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>

        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">Step 2: Add Your budget Items</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        Add all income and expenditure to you Budget. Items on your Budget are income or expenditure 
                        and can be set to repeat monthly or annually.
                    </p>

                    <p class="mt-4 text-xl text-gray-800">
                        We have help pages to guide you through adding each of our supported budget item types, 
                        income, expense and savings.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/getting-started/add-a-budget-item.png') }}" alt="Add a budget items" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>

        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">Step 3: Set Exclusions</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        Things don't always occur on a rigid schedule, when you need flexibility, use our exclusions. 
                        Council Tax is an example of monthly expenditure that doesn't follow a fixed schedule, for 
                        lots of us, we don't pay Council Tax in February and March.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('/images/getting-started/set-exclusions.png') }}" alt="Set budget item exclusions" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>

        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">Step 4: View your Projections</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        Head on over to our Workflow page to understand how we generate your projections.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/getting-started/view-projections.png') }}" alt="View your account projections" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>

        <x-layout.footer />

        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

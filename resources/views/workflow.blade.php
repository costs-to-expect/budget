<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="The Budget Workflow provides three easy steps to use the App. Start by setting your balances, mark expenses as paid and see your projections for the period.">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Workflow</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="Budget: Workflow" description="The Budget Workflow provides three easy steps to use the App. Start by setting your balances, mark expenses as paid and see your projections for the period." />
        <x-layout.twitter-card title="Budget: Workflow" description="The Budget Workflow provides three easy steps to use the App. Start by setting your balances, mark expenses as paid and see your projections for the period." />
    </head>
    <body>
        <x-layout.navbar activeRoute="features" />

        <div class="relative overflow-hidden bg-white py-16">
        
            <div class="relative px-6 lg:px-8">
                <div class="mx-auto max-w-prose text-lg">
                    <h1>
                        <span class="block text-center text-lg font-semibold text-pinky-700">Our simple workflow</span>
                        <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-black sm:text-4xl">Workflow</span>
                    </h1>
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        Once you have added all your income and expenses to your Budget, there are two parts to the 
                        workflow. Check below to see how it works.
                    </p>

                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        Learn how to define your Budget with our 
                        <x-helper.control.link.text :route="route('getting-started')" label="Getting Started" /> page.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">Step 1: Update Your balances</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        Set the current balances for any of the accounts known to Budget.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/workflow/update-balances.png') }}" alt="Update your balances" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>

        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">Step 2: Mark as Paid</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        For the current month, we need to know which items have already been accounted for. Select 
                        the budget item and "Mark as Paid".
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/workflow/mark-as-paid.png') }}" alt="Mark budget items as paid" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>

        <div class="bg-white pb-12">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-5xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-pinky-700">View Your Projections</h2>
                    <p class="mt-4 text-xl text-gray-800">
                        Once we know your starting balances and everything due to come in and go out, we can 
                        generate your projections.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/workflow/view-projections.png') }}" alt="View your projections" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>

        <x-layout.footer />

        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

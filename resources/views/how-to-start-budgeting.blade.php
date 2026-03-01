<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Taking you through the simple steps you need to start budgeting. Understanding your net income and tracking your expenses is key to creating an effective budget">
        <meta name="author" content="Dean Blackborough">
        <title>How to start Budgeting?</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="How to start Budgeting?" description="Taking you through the simple steps you need to start budgeting. Understanding your net income and tracking your expenses is key to creating an effective budget" />
        <x-layout.twitter-card title="How to start Budgeting?" description="Taking you through the simple steps you need to start budgeting. Understanding your net income and tracking your expenses is key to creating an effective budget" />
    </head>
    <body>
        <x-layout.navbar activeRoute="budgeting" />

        <div class="relative overflow-hidden bg-white py-16">
            <div class="hidden lg:absolute lg:inset-y-0 lg:block lg:h-full lg:w-full lg:[overflow-anchor:none]">
                <div class="relative mx-auto h-full max-w-prose text-lg" aria-hidden="true">
                    <svg class="absolute top-12 left-full translate-x-32 transform" width="404" height="384" fill="none" viewBox="0 0 404 384">
                        <defs>
                            <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                    </svg>
                    <svg class="absolute top-1/2 right-full -translate-y-1/2 -translate-x-32 transform" width="404" height="384" fill="none" viewBox="0 0 404 384">
                        <defs>
                            <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                    </svg>
                    <svg class="absolute bottom-12 left-full translate-x-32 transform" width="404" height="384" fill="none" viewBox="0 0 404 384">
                        <defs>
                            <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                    </svg>
                </div>
            </div>
            <div class="relative px-6 lg:px-8">
                <div class="mx-auto max-w-prose text-lg">
                    <h1>
                        <span class="block text-center text-lg font-semibold text-pinky-700">Budgeting</span>
                        <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-black sm:text-4xl">How to Start Budgeting</span>
                    </h1>
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        Budgeting is a bit like exercising. It can be difficult to motivate yourself
                        to start but once you take the plunge, it doesn’t take long to reap the
                        benefits. There’s lots of <x-helper.control.link.text :route="route('reasons-to-start-budgeting')" label="reasons for starting a budget" />
                        but essentially, it can help you to manage your money and plan for the future.
                    </p>
        
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        If you’ve decided to create a budget, here’s how to get started:
                    </p>
                </div>
                <div class="prose prose-lg prose-indigo mx-auto mt-6 text-gray-500">

                    <h2>Know what your net income is</h2>

                    <p>
                        Seems simple, right? Just remember your net income is what you take home after tax and 
                        other costs such as pension contributions have been deducted. If you receive any benefits, 
                        remember to add these into the pot. If you’re one half of a couple, you’ll have extra 
                        calculations to make.
                    </p>

                    <h2>Start tracking your expenses</h2>

                    <p>
                        Before you even start a budget, you need to understand what you’re spending. It’s important that you 
                        track everything – even those coffees on the way to work! You might be surprised by how 
                        expenses add up. Track your spending for at least a month so that you have a good understanding of your expenses.
                    </p>

                    <h2>List your expenses and label them</h2>

                    <p>
                        Your expenses will fall into two categories: Fixed expenses are the ones which are always 
                        the same and must be paid. Variable expenses can change from month to month and are not 
                        strictly necessary – we call them the “fun stuff”!
                    </p>

                    <h2>Choose your budgeting approach </h2>

                    <p>
                        What works for one person, won’t work for everyone. There are 
                        <x-helper.control.link.text :route="route('what-is-budgeting')" label="several different ways of budgeting" /> 
                        and it’s up to you to decide which approach suits you. Our "What is Budgeting?" 
                        page outlines some of the different approaches to budgeting which might help you get 
                        started. <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com/our-budgeting-story" label="Our Budgeting Story" :external="true" />
                        over on Budget Pro might give you further tips and ideas.
                    </p>

                    <h2>Start managing your money</h2>

                    <p>
                        Ready for some more calculations? If the difference between your income and expenditure is 
                        making money tight, you may have to make adjustments to your spending habits – remember 
                        those variable expenses?!
                    </p>

                    <p>
                        Now you’re well on your way to having an effective budget and managing your money so that 
                        it works for you. This app allows you to create a free budget. If you’d like more advanced 
                        budgeting features, check out the <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com/getting-started" label="Getting started page" :external="true" /> 
                        over on our sister App, <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com" label="Budget Pro" :external="true" />.
                    </p>
                    
                </div>
            </div>
        </div>

        <x-layout.footer />

        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

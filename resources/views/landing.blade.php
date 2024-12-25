<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A budgeting calculator that is so easy to use, it’s child play! - Budget is the free open source of Budget Pro">
        <meta name="author" content="Dean Blackborough">
        <title>Budget by Costs to Expect</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="Budget by Costs to Expect" description="A budgeting calculator that is so easy to use, it’s child play! - Budget is the free open source of Budget Pro" />
        <x-layout.twitter-card title="Budget by Costs to Expect" description="A budgeting calculator that is so easy to use, it’s child play! - Budget is the free open source of Budget Pro" />
    </head>
    <body>
        <x-layout.navbar activeRoute="landing" />

        <div class="bg-white">
            <div class="mx-auto max-w-7xl py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-pinky-600">
                        Budget
                    </h2>
                    <p class="mt-1 text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl lg:text-4xl">
                        Your free budget calculator - make your money work for you!
                    </p>
        
                    <div class="my-6 space-x-2">
                        <a href="{{ route('sign-in.view') }}" class="bg-pinky-500 px-4 py-2 rounded-md text-base font-medium text-white hover:bg-pinky-700">Sign-in</a>
                        <a href="{{ route('register.view') }}" class="bg-black px-4 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Register for Free</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-4 sm:px-6 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h1 class="text-4xl font-bold tracking-tight text-pinky-700">Welcome to Budget</h1>
                    <p class="mt-4 text-lg text-gray-800">
                        Costs to Expect is proud to present our free Budget Calculator, Budget!
                    </p>
                    <p class="mt-4 text-lg text-gray-800">
                        Budget has everything you need to manage a simple Budget, if you need more control and 
                        power you can try out Budget Pro with a  
                        <x-helper.control.link.text :route="route('auth.register')" label="30 day free trial" />,
                        today!
                    </p>
        
                    <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
                        <x-content.landing.feature title="Monthly and Annual frequencies" description="Budget allows you to schedule expenses annually and monthly" />

                        <x-content.landing.feature title="Monthly exclusion" description="In Budget you can set months which an expense should not occur" />
        
                        <x-content.landing.feature title="Multiple transaction types" description="Budget supports three transaction types; income, expense and savings." />
        
                        <x-content.landing.feature title="Instant projections" description="In Budget the projections are instant - you can see how you budget will change immediately." />
        
                        <x-content.landing.feature title="Demo mode" description="You can set Budget to demo mode to see how the app works." />
        
                        <x-content.landing.feature title="Multiple currencies" description="Budget supports seven currencies, GBP, USD, EUR, CAD, AUD, NZD & INR." />
                    </dl>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/landing/view-projections.png') }}" alt="Budget projections screen shot" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>

        <div class="bg-white">
            <div class="mx-auto max-w-7xl py-4 px-4 sm:py-12 sm:pt-6 lg:pt-8 sm:px-6 lg:px-8">
        
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-pinky-600">Budget vs Budget Pro</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Compare versions</p>
                </div>
        
                <div class="mx-auto max-w-2xl">
                    <p class="mt-12 mb-12 text-gray-800">
                        How do the different versions of Budget compare? Check the tables below
                        to see which version might be right for you. An asterisk indicates the feature
                        is coming along with which update it is due to be included in.
                    </p>
                </div>
        
                <!-- xs to lg -->
                <div class="mx-auto max-w-2xl space-y-16 lg:hidden">
                    <section>
                        <div class="mb-8 px-4">
                            <h2 class="text-lg font-medium leading-6 text-gray-900">Budget Pro</h2>
                            <p class="mt-4">
                                <span class="text-3xl font-bold tracking-tight text-pinky-600">&pound;19.99</span>
                                <span class="text-base font-medium text-gray-800">/ lifetime </span>
                            </p>
                            <p class="mt-4 text-lg text-black">Budget Pro is Budget on steroids - it's everything you love about Budget and much more.</p>
                            <p class="mt-4 text-sm text-gray-800">Budget Pro is subject to a small lifetime fee and will get regular updates.</p>
                            <a href="https://budget-pro.costs-to-expect.com/register" class="mt-6 block w-full rounded-md border border-pinky-700 bg-pinky-600 py-2 text-center text-sm font-semibold text-white hover:bg-pinky-900">Register (30 day trial)</a>
                        </div>
        
                        <table class="w-full">
        
                            <x-content.landing.table-header-row-mobile title="Version limits" />
        
                            <tbody class="divide-y divide-gray-200">
        
                            <x-content.landing.table-row-mobile feature="Number of Budgets" description="3"/>
                            <x-content.landing.table-row-mobile feature="Projection accounts per Budget" description="Unlimited"/>
                            <x-content.landing.table-row-mobile feature="Budget items per Budget" description="Unlimited"/>
        
                            </tbody>
                        </table>
        
                        <table class="w-full">
        
                            <x-content.landing.table-header-row-mobile title="Sharing" />
        
                            <tbody class="divide-y divide-gray-200">
        
                            <x-content.landing.table-row-mobile feature="Share Budget" description="Yes *Update2"/>
                            <x-content.landing.table-row-mobile feature="Sharing limit" description="Unlimited *Update2"/>
        
                            </tbody>
                        </table>
        
                        <table class="w-full">
        
                            <x-content.landing.table-header-row-mobile title="Features" />
        
                            <tbody class="divide-y divide-gray-200">
        
                            <x-content.landing.table-row-mobile feature="Open Source" description="No"/>
                            <x-content.landing.table-row-mobile feature="Transaction types" description="Income, Expense, Savings & Transfers"/>
                            <x-content.landing.table-row-mobile feature="Fixed Budget item amounts" description="e.g. &pound;50.00 per month"/>
                            <x-content.landing.table-row-mobile feature="Range Based Budget item amounts" description="e.g. &pound;35.00-45.00 per month *Update 2"/>
                            <x-content.landing.table-row-mobile feature="Budget item increases" description="e.g. 5% increase every 12 months *Update 1"/>
                            <x-content.landing.table-row-mobile feature="Savings tools" description="Savings calculator & savings growth *Update 1"/>
                            <x-content.landing.table-row-mobile feature="Disable Budget items" description="Yes"/>
                            <x-content.landing.table-row-mobile feature="Copy a Budget" description="Yes"/>
                            <x-content.landing.table-row-mobile feature="Copy Budget items" description="Yes"/>
                            <x-content.landing.table-row-mobile feature="Ad-Hoc Budget Item Adjustments" description="Yes"/>
                            <x-content.landing.table-row-mobile feature="Supported Ad-Hoc Adjustments" description="Amount, others planned *Update 2"/>
                            <x-content.landing.table-row-mobile feature="Currencies Supported" description="GBP, EUR, USD, CAD, NZD, INR &amp; AUD"/>
                            <x-content.landing.table-row-mobile feature="Budget Item Frequencies" description="Four-weekly, Annually, Monthly & One-Off, others planned *Update 1"/>
                            <x-content.landing.table-row-mobile feature="Budget Item Exclusions" description="As per Budget plus weekends, holidays and more *Update 1"/>
                            <x-content.landing.table-row-mobile feature="Search Budget Items" description="Powerful search"/>
                            <x-content.landing.table-row-mobile feature="Batch actions" description="Yes"/>
                            <x-content.landing.table-row-mobile feature="Import from Budget" description="N/A"/>
        
                            </tbody>
                        </table>
        
                        <table class="w-full">
        
                            <x-content.landing.table-header-row-mobile title="Viewing features" />
        
                            <tbody class="divide-y divide-gray-200">
        
                            <x-content.landing.table-row-mobile feature="Set Timezone" description="Yes"/>
                            <x-content.landing.table-row-mobile feature="Set Date Format" description="Yes"/>
                            <x-content.landing.table-row-mobile feature="Number of visible months on Budget" description="3, 6 &amp; quarterly"/>
                            <x-content.landing.table-row-mobile feature="Customise expense bars" description="Yes"/>
        
                            </tbody>
                        </table>
        
                    </section>
        
                    <section>
                        <div class="mb-8 px-4">
                            <h2 class="text-lg font-medium leading-6 text-gray-900">Budget</h2>
                            <p class="mt-4">
                                <span class="text-3xl font-bold tracking-tight text-pinky-700">Free</span>
                            </p>
                            <p class="mt-4 text-lg text-black">A budgeting tool so easy to use, it’s child play!</p>
                            <p class="mt-4 text-sm text-gray-800">A free, open source budgeting tool powered by the Costs to Expect API.</p>
                            <a href="{{ route('register.view') }}" class="mt-6 block w-full rounded-md border border-pinky-700 bg-pinky-600 py-2 text-center text-sm font-semibold text-white hover:bg-pinky-900">Register</a>
                        </div>
        
                        <table class="w-full">
        
                            <x-content.landing.table-header-row-mobile title="Version limits" />
        
                            <tbody class="divide-y divide-gray-200">
        
                            <x-content.landing.table-row-mobile feature="Number of Budgets" description="1"/>
                            <x-content.landing.table-row-mobile feature="Projection accounts per Budget" description="3"/>
                            <x-content.landing.table-row-mobile feature="Budget items per Budget" description="100"/>
        
                            </tbody>
                        </table>
        
                        <table class="w-full">
        
                            <x-content.landing.table-header-row-mobile title="Sharing" />
        
                            <tbody class="divide-y divide-gray-200">
        
                            <x-content.landing.table-row-mobile feature="Share Budget" description="No"/>
                            <x-content.landing.table-row-mobile feature="Sharing limit" description="N/A"/>
        
                            </tbody>
                        </table>
        
                        <table class="w-full">
        
                            <x-content.landing.table-header-row-mobile title="Features" />
        
                            <tbody class="divide-y divide-gray-200">
        
                            <x-content.landing.table-row-mobile feature="Open Source" description="Yes - MIT License"/>
                            <x-content.landing.table-row-mobile feature="Transaction types" description="Income, Expense & Savings"/>
                            <x-content.landing.table-row-mobile feature="Fixed Budget item amounts" description="e.g. &pound;50.00 per month"/>
                            <x-content.landing.table-row-mobile feature="Range Based Budget item amounts" description="No"/>
                            <x-content.landing.table-row-mobile feature="Budget item increases" description="No"/>
                            <x-content.landing.table-row-mobile feature="Savings tools" description="No"/>
                            <x-content.landing.table-row-mobile feature="Disable Budget items" description="Yes"/>
                            <x-content.landing.table-row-mobile feature="Copy a Budget" description="No"/>
                            <x-content.landing.table-row-mobile feature="Copy Budget items" description="No"/>
                            <x-content.landing.table-row-mobile feature="Ad-Hoc Budget Item Adjustments" description="Yes"/>
                            <x-content.landing.table-row-mobile feature="Supported Ad-Hoc Adjustments" description="Amount"/>
                            <x-content.landing.table-row-mobile feature="Currencies Supported" description="GBP, EUR, USD, CAD, NZD, INR &amp; AUD"/>
                            <x-content.landing.table-row-mobile feature="Budget Item Frequencies" description="Annually, Monthly &amp; One-Off"/>
                            <x-content.landing.table-row-mobile feature="Budget Item Exclusions" description="Months for monthly frequencies"/>
                            <x-content.landing.table-row-mobile feature="Search Budget Items" description="Simple search - Client side"/>
                            <x-content.landing.table-row-mobile feature="Batch Actions" description="No"/>
                            <x-content.landing.table-row-mobile feature="Import from Budget" description="Yes - Automatic"/>
        
                            </tbody>
                        </table>
        
                        <table class="w-full">
        
                            <x-content.landing.table-header-row-mobile title="Viewing features" />
        
                            <tbody class="divide-y divide-gray-200">
        
                            <x-content.landing.table-row-mobile feature="Set Timezone" description="No"/>
                            <x-content.landing.table-row-mobile feature="Set Date Format" description="No"/>
                            <x-content.landing.table-row-mobile feature="Number of visible months on Budget" description="3"/>
                            <x-content.landing.table-row-mobile feature="Customise expense bars" description="No"/>
        
                            </tbody>
                        </table>
        
                    </section>
                </div>
        
                <!-- lg+ -->
                <div class="hidden lg:block">
                    <table class="h-px w-full table-fixed">
                        <caption class="sr-only">
                            Version comparison
                        </caption>
                        <thead>
                        <tr>
                            <th class="px-6 pb-4 text-left text-sm font-medium text-gray-900" scope="col">
                                <span class="sr-only">Feature by</span>
                                <span>Features by version</span>
                            </th>
                            <th class="w-1/3 px-6 pb-4 text-left text-lg font-medium leading-6 text-gray-900" scope="col">Budget</th>
                            <th class="w-1/3 px-6 pb-4 text-left text-lg font-medium leading-6 text-gray-900" scope="col">Budget Pro</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 border-t border-gray-200">
                        <tr>
                            <th class="py-8 px-6 text-left align-top text-sm font-medium text-gray-900" scope="row">Pricing</th>
        
                            <td class="h-full py-8 px-6 align-top">
                                <div class="relative table h-full">
                                    <p>
                                        <span class="text-4xl font-bold tracking-tight text-pinky-600">Free</span>
                                    </p>
                                    <p class="mt-4 text-lg text-black">A budgeting tool so easy to use, it’s child play!</p>
                                    <p class="mt-4 mb-16 text-sm text-gray-800">A free, open source budgeting tool powered by the Costs to Expect API.</p>
                                    <a href="https://budget.costs-to-expect.com" class="absolute bottom-0 block w-full flex-grow rounded-md border border-pinky-700 bg-pinky-600 py-2 text-center text-sm font-semibold text-white hover:bg-pinky-900">Register for Free</a>
                                </div>
                            </td>
        
                            <td class="h-full py-8 px-6 align-top">
                                <div class="relative table h-full">
                                    <p>
                                        <span class="text-4xl font-bold tracking-tight text-pinky-600">&pound;19.99</span>
                                        <span class="text-base font-medium text-gray-800">/ lifetime </span>
                                    </p>
                                    <p class="mt-4 text-lg text-black">Budget Pro is Budget on steroids - it's everything you love about Budget and much more.</p>
                                    <p class="mt-4 mb-16 text-sm text-gray-800">Budget Pro is subject to a small lifetime fee and will get regular updates.</p>
                                    <a href="{{ route('auth.register') }}" class="absolute bottom-0 block w-full flex-grow rounded-md border border-pinky-700 bg-pinky-600 py-2 text-center text-sm font-semibold text-white hover:bg-pinky-900">Register (30 day trial)</a>
                                </div>
                            </td>
                        </tr>
        
                        <x-content.landing.table-header-row-desktop title="Version limits" />
        
                        <x-content.landing.table-row-desktop feature="Number of Budgets" budget="1" budgetPro="3" />
                        <x-content.landing.table-row-desktop feature="Projection accounts per Budget" budget="3" budgetPro="Unlimited" />
                        <x-content.landing.table-row-desktop feature="Budget items per Budget" budget="100" budgetPro="Unlimited" />
        
                        <x-content.landing.table-header-row-desktop title="Sharing" />
        
                        <x-content.landing.table-row-desktop feature="Share Budgets" budget="No" budgetPro="Yes *Update 2" />
                        <x-content.landing.table-row-desktop feature="Sharing Limit" budget="No" budgetPro="Unlimited *Update 2" />
        
                        <x-content.landing.table-header-row-desktop title="Features" />
        
                        <x-content.landing.table-row-desktop feature="Open Source" budget="Yes" budgetPro="No" />
                        <x-content.landing.table-row-desktop feature="Transaction types" budget="Income, Expense & Savings" budgetPro="Income, Expense, Savings & Transfers" />
                        <x-content.landing.table-row-desktop feature="Fixed Budget item amounts" budget="e.g. £50.00 per month" budgetPro="e.g. £50.00 per month" />
                        <x-content.landing.table-row-desktop feature="Range Based Budget item amounts" budget="No" budgetPro="e.g. £35.00-45.00 per month *Update 2" />
                        <x-content.landing.table-row-desktop feature="Budget item increases" budget="No" budgetPro="e.g. 5% increase every 12 months *Update 1" />
                        <x-content.landing.table-row-desktop feature="Savings tools" budget="No" budgetPro="Savings calculator & savings growth *Update 1" />
                        <x-content.landing.table-row-desktop feature="Disable budget items" budget="Yes" budgetPro="Yes" />
                        <x-content.landing.table-row-desktop feature="Copy a Budget" budget="No" budgetPro="Yes" />
                        <x-content.landing.table-row-desktop feature="Ad-Hoc Budget Item Adjustments" budget="Yes" budgetPro="Yes" />
                        <x-content.landing.table-row-desktop feature="Supported Ad-Hoc Adjustments" budget="Amount" budgetPro="Amount, others planned *Update 2" />
        
                        <x-content.landing.table-row-desktop feature="Currencies Supported" budget="GBP, EUR, USD, CAD, NZD, INR & AUD" budgetPro="GBP, EUR, USD, CAD, NZD, INR & AUD" />
                        <x-content.landing.table-row-desktop feature="Budget Item Frequencies" budget="Annually, Monthly & One-Off" budgetPro="Four-weekly, Annually, Monthly & One-Off, other planned *Update 1" />
                        <x-content.landing.table-row-desktop feature="Budget Item Exclusions" budget="Months for monthly frequencies" budgetPro="As per Budget plus weekends, holidays and more *Update 1" />
                        <x-content.landing.table-row-desktop feature="Search Budget Items" budget="Simple search - Client side" budgetPro="Powerful search" />
                        <x-content.landing.table-row-desktop feature="Batch Actions" budget="No" budgetPro="Yes" />
                        <x-content.landing.table-row-desktop feature="Import from Budget" budget="Yes - Automatic" budgetPro="N/A" />
        
                        <x-content.landing.table-header-row-desktop title="Viewing features" />
        
                        <x-content.landing.table-row-desktop feature="Set Timezone" budget="No" budgetPro="Yes" />
                        <x-content.landing.table-row-desktop feature="Set Date Format" budget="No" budgetPro="Yes" />
                        <x-content.landing.table-row-desktop feature="Number of visible months on Budget" budget="3" budgetPro="3, 6 and quarterly" />
                        <x-content.landing.table-row-desktop feature="Customise expense bars" budget="No" budgetPro="Yes" />
        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <x-layout.footer />

        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>
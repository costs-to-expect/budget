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
                        <x-content.landing.feature title="Complex frequencies and exclusions" description="Budget Pro includes more powerful scheduling tools for expenses, you aren't limited to monthly and annual frequencies." />
        
                        <x-content.landing.feature title="More transaction types" description="Budget Pro supports four transaction types; income, expense, transfer and savings." />
        
                        <x-content.landing.feature title="Multiple views" description="In Budget Pro you aren't limited to a monthly view, we show a quarter at a time and plan to add a quarterly view to show an entire year." />
        
                        <x-content.landing.feature title="Multiple Budgets" description="Need multiple Budgets? With Budget Pro you can create up to three Budgets." />
        
                        <x-content.landing.feature title="Saving Projections" description="Budget Pro includes saving projects and can even help you decide how much you need to save." />
        
                        <x-content.landing.feature title="Batch actions" description="Budget Pro lets you manage multiple budget items in one step." />
        
                        <x-content.landing.feature title="Customisation" description="In Budget Pro you have control over how your Budget looks." />
        
                        <x-content.landing.feature title="And much more" description="We have a public roadmap which details what is coming in the future." />
        
                    </dl>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/landing/budget-pro.png') }}" alt="Budget overview screen shot" class="rounded-lg object-cover shadow-xl">
                </div>
            </div>
        </div>


        <div class="mx-auto max-w-7xl py-16 px-4 sm:py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-pinky-600">Budgeting</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Let's get you started</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Before you get started with Budget Pro, let's look at what budgeting is, why you might choose to
                    start a budget and how to actually get your Budget going.</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-pinky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v.756a49.106 49.106 0 0 1 9.152 1 .75.75 0 0 1-.152 1.485h-1.918l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 18.75 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84l2.474-10.124H12.75v13.28c1.293.076 2.534.343 3.697.776a.75.75 0 0 1-.262 1.453h-8.37a.75.75 0 0 1-.262-1.453c1.162-.433 2.404-.7 3.697-.775V6.24H6.332l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 5.25 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84L4.168 6.241H2.25a.75.75 0 0 1-.152-1.485 49.105 49.105 0 0 1 9.152-1V3a.75.75 0 0 1 .75-.75Zm4.878 13.543 1.872-7.662 1.872 7.662h-3.744Zm-9.756 0L5.25 8.131l-1.872 7.662h3.744Z" clip-rule="evenodd" />
                            </svg>
        
                            What is Budgeting?
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                Budgeting is simply the process of balancing your income and outcome and thus creating
                                a plan for how you'll spend your money. It's that simple.
                            </p>
                            <p class="mt-6">
                                <a href="{{ route('content.what-is-budgeting') }}" class="text-sm font-semibold leading-6 text-pinky-600">Learn more <span aria-hidden="true">→</span></a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-pinky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0A.75.75 0 0 1 8.25 6h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.625 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 12a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12A.75.75 0 0 1 7.5 12Zm-4.875 5.25a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>
        
                            Reasons to start Budgeting
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                <x-helper.control.link.text :route="route('content.getting-started')" label="Getting started with a budget" />
                                and tracking your finances might seem onerous and time-consuming but there are many reasons why you might find starting a budget useful.
                            </p>
                            <p class="mt-6">
                                <a href="{{ route('content.reasons-to-start-budgeting') }}" class="text-sm font-semibold leading-6 text-pinky-600">Learn more <span aria-hidden="true">→</span></a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-pinky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M6.32 1.827a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V4.757c0-1.47 1.073-2.756 2.57-2.93ZM7.5 11.25a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H8.25a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H8.25Zm-.75 3a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H8.25a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75H8.25Zm1.748-6a.75.75 0 0 1 .75-.75h.007a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.007a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.007Zm-.75 3a.75.75 0 0 1 .75-.75h.007a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.007a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75h-.007Zm1.754-6a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.008Zm-.75 3a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75h-.008Zm1.748-6a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.008Zm-8.25-6A.75.75 0 0 1 8.25 6h7.5a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75v-.75Zm9 9a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-2.25Z" clip-rule="evenodd" />
                            </svg>
        
                            How to start Budgeting
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                Budgeting is a bit like exercising. It can be difficult to motivate yourself
                                to start but once you take the plunge, it doesn’t take long to reap the
                                benefits.
                            </p>
                            <p class="mt-6">
                                <a href="{{ route('content.how-to-start-budgeting') }}" class="text-sm font-semibold leading-6 text-pinky-600">Learn more <span aria-hidden="true">→</span></a>
                            </p>
                        </dd>
                    </div>
        
                </dl>
            </div>
        </div>

        <div class="mx-auto max-w-7xl py-16 px-4 sm:py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-pinky-600">Budgeting Basics</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need to know about budgeting</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Think budgeting is difficult and complicated? Want to know how to explain budgeting to kids?
                    Here’s everything you need to know…
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-pinky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v.756a49.106 49.106 0 0 1 9.152 1 .75.75 0 0 1-.152 1.485h-1.918l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 18.75 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84l2.474-10.124H12.75v13.28c1.293.076 2.534.343 3.697.776a.75.75 0 0 1-.262 1.453h-8.37a.75.75 0 0 1-.262-1.453c1.162-.433 2.404-.7 3.697-.775V6.24H6.332l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 5.25 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84L4.168 6.241H2.25a.75.75 0 0 1-.152-1.485 49.105 49.105 0 0 1 9.152-1V3a.75.75 0 0 1 .75-.75Zm4.878 13.543 1.872-7.662 1.872 7.662h-3.744Zm-9.756 0L5.25 8.131l-1.872 7.662h3.744Z" clip-rule="evenodd" />
                            </svg>
        
                            Budgeting Myths
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                There are many misconceptions around what budgeting is
                                and what it involves. Many people view budgeting as negative and
                                restrictive, hence never giving it a fair shot. Here our team
                                bust some of the myths which surround budgeting and hope to allow you to
                                see the process in a whole new light!
                            </p>
                            <p class="mt-6">
                                <a href="{{ route('content.budgeting-myths') }}" class="text-sm font-semibold leading-6 text-pinky-600">Learn more <span aria-hidden="true">→</span></a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-pinky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0A.75.75 0 0 1 8.25 6h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.625 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 12a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12A.75.75 0 0 1 7.5 12Zm-4.875 5.25a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>
        
                            Good Money Habits
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                There are loads of good money habits which you should adopt to help ensure
                                that your money is safe and that you have a healthy bank balance. Here we
                                look at some good money habits that can help set you up for a financially
                                secure future.
                            </p>
                            <p class="mt-6">
                                <a href="{{ route('content.good-money-habits') }}" class="text-sm font-semibold leading-6 text-pinky-600">Learn more <span aria-hidden="true">→</span></a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-pinky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M6.32 1.827a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V4.757c0-1.47 1.073-2.756 2.57-2.93ZM7.5 11.25a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H8.25a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H8.25Zm-.75 3a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H8.25a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75H8.25Zm1.748-6a.75.75 0 0 1 .75-.75h.007a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.007a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.007Zm-.75 3a.75.75 0 0 1 .75-.75h.007a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.007a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75h-.007Zm1.754-6a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.008Zm-.75 3a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75h-.008Zm1.748-6a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.008Zm-8.25-6A.75.75 0 0 1 8.25 6h7.5a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75v-.75Zm9 9a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-2.25Z" clip-rule="evenodd" />
                            </svg>
        
                            Teaching Kids about Budgeting
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                Budgeting is a skill that is best learned as early as possible so that
                                children learn good money habits. Teaching your kids how to budget
                                is one of the best things you can do to set them up for a financially
                                secure future. Whatever age your kids are, there’s loads of things
                                you can do now to start teaching them the importance of budgeting and
                                why they should budget.
                            </p>
                            <p class="mt-6">
                                <a href="{{ route('content.teaching-kids-about-budgeting') }}" class="text-sm font-semibold leading-6 text-pinky-600">Learn more <span aria-hidden="true">→</span></a>
                            </p>
                        </dd>
                    </div>
        
                </dl>
            </div>
        </div>

        <div class="mx-auto max-w-7xl py-16 px-4 sm:py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-pinky-600">Pricing</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">How much is Budget Pro?</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-pinky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM9.763 9.51a2.25 2.25 0 0 1 3.828-1.351.75.75 0 0 0 1.06-1.06 3.75 3.75 0 0 0-6.38 2.252c-.033.307 0 .595.032.822l.154 1.077H8.25a.75.75 0 0 0 0 1.5h.421l.138.964a3.75 3.75 0 0 1-.358 2.208l-.122.242a.75.75 0 0 0 .908 1.047l1.539-.512a1.5 1.5 0 0 1 .948 0l.655.218a3 3 0 0 0 2.29-.163l.666-.333a.75.75 0 1 0-.67-1.342l-.667.333a1.5 1.5 0 0 1-1.145.082l-.654-.218a3 3 0 0 0-1.898 0l-.06.02a5.25 5.25 0 0 0 .053-1.794l-.108-.752H12a.75.75 0 0 0 0-1.5H9.972l-.184-1.29a1.863 1.863 0 0 1-.025-.45Z" clip-rule="evenodd" />
                            </svg>
        
                            Pricing
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                You can purchase a Budget Pro Lifetime Licence fee for just &pound;19.99.
                                This is a one-off fee as we believe monthly subscriptions complicate
                                budgeting!
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-pinky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>
        
                            What's included
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">
                                When you purchase your Lifetime Licence fee, you’ll get just that! It includes access
                                to all of our fantastic budgeting features, as well as all our future updates to
                                the App!
                            </p>
                        </dd>
                    </div>
                </dl>
                <div class="flex mt-4">
                    <p class="flex-auto text-base leading-7 text-gray-600">
                        So just to be clear: there’s no recurring payments with Budget Pro.
                        One lifetime purchase, with full access to the App.  It’s as simple
                        as that!
                    </p>
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
                            <a href="{{ route('auth.register') }}" class="mt-6 block w-full rounded-md border border-pinky-700 bg-pinky-600 py-2 text-center text-sm font-semibold text-white hover:bg-pinky-900">Register (30 day trial)</a>
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
                            <a href="https://budget.costs-to-expect.com" class="mt-6 block w-full rounded-md border border-pinky-700 bg-pinky-600 py-2 text-center text-sm font-semibold text-white hover:bg-pinky-900">Register</a>
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
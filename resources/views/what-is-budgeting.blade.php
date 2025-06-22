<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="If you're wondering what budgeting is, here we explain the concept as well as the different approaches to budgeting including zero based and the reverse budget.">
        <meta name="author" content="Dean Blackborough">
        <title>What is Budgeting?</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="What is Budgeting?" description="If you're wondering what budgeting is, here we explain the concept as well as the different approaches to budgeting including zero based and the reverse budget." />
        <x-layout.twitter-card title="What is Budgeting?" description="If you're wondering what budgeting is, here we explain the concept as well as the different approaches to budgeting including zero based and the reverse budget." />
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
                        <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-black sm:text-4xl">What is Budgeting?</span>
                    </h1>
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        Budgeting is a great financial discipline and is simply the process of balancing your income 
                        and out goings, thus creating a plan for how you’ll spend your money. It’s that simple.
                    </p>
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        <x-helper.control.link.text :route="route('how-to-start-budgeting')" label="Starting a budget" /> 
                        can help you to determine whether you’ll have enough cash-flow to do what you need/want to 
                        and can help you to identify where you might be able to make savings.
                    </p>
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        Budgeting can also help you to build up an emergency fund so that you're prepared for 
                        those unexpected costs which catch most of us out.
                    </p>
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        There are several different approaches to budgeting and what works for one person, may not 
                        work for someone else. You can read about 
                        <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com/our-budgeting-story" label="our-budgeting-story" /> 
                        and the approach we decided to adopt on Budget Pro.
                    </p>
                </div>
                <div class="prose prose-lg prose-indigo mx-auto mt-6 text-gray-500">

                    <h2>Zero-based budgeting</h2>

                    <p>
                        The aim of this approach is to ensure that every single pound (dollar/euro etc) of your 
                        income is accounted for in your expenditure. Your income minus your expenses equals 
                        zero every month.
                    </p>
                    <p>
                        So if you earn &pound;2,000 per month, you will plan where every single &pound; or $ will go.
                    </p>

                    <h2>50/30/20 Budget Plan</h2>

                    <p>
                        This is a common budget approach and allows much more flexibility. The goal is that 50&percnt; 
                        of your income goes towards the essentials - food, mortgage/rent and bills. 30&percnt; goes 
                        towards "wants", or what we call the "fun stuff" – takeouts, days out and holidays.
                    </p>

                    <p>
                        Yes, you read that correctly - <em>a budget is not about restricting what you spend</em>, 
                        more about planning what you spend.
                    </p>

                    <p>
                        The last 20&percnt; of your income goes into savings or investments.
                    </p>

                    <h2>The Reverse Budget</h2>

                    <p>
                        This method of budgeting turns the traditional approach on its head by putting saving 
                        ahead of any other expenses. Save first and then spend. This prioritises your financial 
                        goals such as paying off debt or saving for a mortgage. Once you have put money towards 
                        your financial goals, you then pay your essential costs.
                    </p>

                    <p>
                        With this budgeting method, you won't have much left over but whatever you have can be 
                        spent on the "fun stuff".
                    </p>

                    <h2>60&percnt; Solution Budget</h2>

                    <p>
                        This approach to budgeting was coined by former MSN Money editor-in-chief
                        <x-helper.control.link.text route="https://web.archive.org/web/20130127123532/http://web.utah.edu/basford/personalfinance/handouts/budgeting/The60Solution.htm" label="Richard Jenkins" />,
                        who realised that traditional budgeting methods just weren't effective for him.
                        His budgeting approach is that 60% of gross income should go towards what Jenkins calls 
                        "committed expenses" – mortgage, food, clothing etc. Jenkins acknowledges that 60% isn't a 
                        magic figure – just what works for his circumstances.
                    </p>

                    <p>
                        The remaining 40&percnt; is divided equally and allocated into four pots: retirement savings, 
                        long-term savings (for bigger purchases), short-term savings (for holidays) and the 
                        all-important "fun stuff".
                    </p>

                    <p>
                        Whatever your reason for starting a budget or whichever method of budgeting you opt for, 
                        our <x-helper.control.link.text :route="route('landing')" label="Free Budget App" /> 
                        will help you take control of your finances and plan your spending. 
                        However, if you’d like more advanced features for managing your budget, you can try our
                        <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com" label="Budget Pro App" />, it is free for the first 30 days and then just &19.99 for a lifetime license.
                    </p>

                </div>
            </div>
        </div>

        <x-layout.footer />

        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

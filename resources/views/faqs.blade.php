<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget Frequently Asked Questions - everything you need to know about our budget tracker app, what's included in the lifetime price & our advanced features">
        <meta name="author" content="Dean Blackborough">
        <title>Budget Pro: FAQs</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <x-layout.open-graph title="Budget Pro: FAQs" description="Budget Frequently Asked Questions - everything you need to know about our budget tracker app, what's included in the lifetime price & our advanced features" />
        <x-layout.twitter-card title="Budget Pro: FAQs" description="Budget Frequently Asked Questions - everything you need to know about our budget tracker app, what's included in the lifetime price & our advanced features" />
    </head>
    <body>
        <x-layout.navbar activeRoute="support" />

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
                        <span class="block text-center text-lg font-semibold text-pinky-700">Support</span>
                        <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-black sm:text-4xl">Budget Frequently asked questions</span>
                    </h1>
                    <p class="mt-8 text-xl leading-8 text-gray-500">
                        Hopefully, any questions you have are answered below, if not, contact us via email @
                        <x-helper.control.link.text route="mailto:support@costs-to-expect.com" label="support@costs-to-expect.com" /> or via GitHub
                    </p>
                </div>
                <div class="prose prose-lg prose-indigo mx-auto mt-6 text-gray-500">
                    
                    <h2>What is Budget?</h2>
        
                    <p>
                        Budget is a free, open source budgeting tool powered by the Costs to Expect API. In three 
                        simple steps, it enables you to manage your budget and see projections for the future.
                    </p>
                    
                    <h2>Why Budget?</h2>
        
                    <p>
                        Our overview is so clear and simple, a child could manage your budget. We wouldn't 
                        recommend it but you get the idea. Did we mention that it’s free?!
                    </p>
                    
                    <h2>How do I setup my Budget?</h2>
                    
                    <p>
                        Setting up your Budget is simple. Start by inputting your balances and expenses. Mark which 
                        expenses have been paid for the month. We’ll give you projections for the months ahead. It's 
                        that easy. Keep track of your budget and build your savings.
                    </p>
        
                    <p>
                        Check out our
                        <x-helper.control.link.text :route="route('getting-started')" label="Getting Started" />
                        section for more detail.
                    </p>
                    
                    <h2>What is the workflow?</h2>
        
                    <p>
                        The workflow explains the simple steps you need to take each time you review your Budget.
                    </p>
                    
                    <p>
                        Check out our <x-helper.control.link.text :route="route('workflow')" label="Workflow" /> 
                        section for more detail.
                    </p>
                    
                    <h2>Can I disable a budget item?</h2>
        
                    <p>
                        Yes, you can disable budget items by toggling them off/on again. When a budget item is 
                        disabled, it will remain visible on your budget but it will not be used in any of your 
                        projection calculations.
                    </p>
                    
                    <h2>Can I adjust the amount of a budget item?</h2>
                    
                    <p>
                        Yes, you can adjust the amount of a budget item on an adhoc basis by using the "adjust amount" 
                        button. Select the relevant budget item and enter the new amount for the chosen month - your 
                        projections will automatically update.
                    </p>
                    
                    <h2>Will Budget always be free?</h2>
                    
                    <p>
                        Budget is currently free and funded by the Costs to Expect API. We have no intention of 
                        monetising Budget. However, we reserve the right to change this if sheer numbers of users 
                        make it un-viable for us to fund it. (But we promise to do our best!)
                    </p>
                    
                    <h2>How do I delete my account?</h2>
        
                    <p>
                        We hope this isn't a question you'll ask but should you want to delete your account, 
                        please go to "Your Account" where we have multiple data deletion options which are quick 
                        and easy.
                    </p>
                    
                    <h2>Do I need to give you my bank account details?</h2>
                    
                    <p>
                        No. Budget is a projection based budget tool - you tell us your balance and based on your 
                        defined Budget, we'll provide you with your financial projections.
                    </p>
                    
                    <h2>Do you support Open Banking?</h2>
                    
                    <p>
                        Budget does not and will not support Open Banking. However, after the release of
                        <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com" label="Budget Pro" />, 
                        one of our first priorities based on user feedback will be to add Open Banking support.
                    </p>
                    
                    <h2>What is Budget Pro?</h2>
                    
                    <p>
                        Budget Pro is the upgraded version of Budget. It includes sharing, multiple budgets as well 
                        many other extra features. It will be subject to a monthly subscription fee.
                    </p>
                    
                    <p>
                        Please review our features comparison table on the homepage to see how Budget and 
                        Budget Pro compare.
                    </p>
                    
                    <h2>Will I be able to upgrade to Budget Pro?</h2>
                    
                    <p>
                        Yes, you are able to upgrade to Budget Pro if you want to. With a single click your Budget 
                        can appear in Budget Pro and you will have access to all the new features.
                    </p>
                    
                    <h2>Will I be able to downgrade from Budget Pro?</h2>
                    
                    <p>
                        We don't know yet but the goal is yes, at some point. Some data may need to be adjusted 
                        during the downgrade but no data should be lost.
                    </p>
                    
                    <h2>Will you update Budget after you release Budget Pro?</h2>
                    
                    <p>
                        Yes, both Budget and Budget Pro will receive regular updates and we have an extensive 
                        list of upgrades planned for both Apps.
                    </p>
                    
                    <h2>Will Budget Pro be open source?</h2>
                    
                    <p>
                        No, Budget Pro will not be an open source product. It is a completely separate App to Budget.
                    </p>
                    
                    <h2>Do you use Budget yourself?</h2>
                    
                    <p>
                        We firmly believe in using our own products. Budget has been developed, built and tested 
                        using our own budgeting needs and we continuously ensure that we can manage our Budget 
                        with this version. We understand that if Budget can't manage our needs, it's unlikely to 
                        work for anyone else.
                    </p>
        
                </div>
            </div>
        </div>

        <x-layout.footer />

        <script src="{{ asset('js/navbar.js') }}" defer></script>
    </body>
</html>

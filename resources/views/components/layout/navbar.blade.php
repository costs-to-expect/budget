<nav class="bg-gray-50 border-b-2 shadow">
    <div class="mx-auto max-w-7xl px-4 sm:px-2 lg:px-6">
        <div class="flex h-12 justify-between">
            <div class="flex">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('landing') }}"><img class="h-8 w-auto" src="{{ asset('images/navbar-logo.png') }}" alt="Costs to Expect"></a>
                </div>
                <div class="hidden sm:ml-3 sm:flex sm:space-x-4 flex items-center">
                    <div id="budgeting" class="relative">
                        @if ($active_route === 'budgeting')
                            <button type="button" class="submenu-toggle flex inline-flex items-center border-b-2 border-pinky-200 px-1 pt-1 pb-2 text-base font-medium text-pinky-900">
                                Budgeting <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <button type="button" class="submenu-toggle flex inline-flex items-center border-b-2 border-transparent px-1 pt-1 pb-2 text-base font-medium text-gray-600 hover:border-gray-600 hover:text-gray-800">
                                Budgeting <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                        <div class="submenu hidden absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <a href="{{ route('content.what-is-budgeting') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">What is Budgeting?</a>
                            <a href="{{ route('content.why-is-budgeting-important') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Why is Budgeting Important?</a>
                            <a href="{{ route('content.reasons-to-start-budgeting') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Reasons to Start Budgeting</a>
                            <a href="{{ route('content.how-to-start-budgeting') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">How to Start Budgeting</a>
                            <a href="{{ route('content.budgeting-myths') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Budgeting Myths</a>
                            <a href="{{ route('content.budgeting-q-and-a') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Budgeting Q&A's</a>
                        </div>
                    </div>

                    <div id="money-advice" class="relative">
                        @if ($active_route === 'money-advice')
                            <button type="button" class="submenu-toggle flex inline-flex items-center border-b-2 border-pinky-200 px-1 pt-1 pb-2 text-base font-medium text-pinky-900">
                                Money Advice <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <button type="button" class="submenu-toggle flex inline-flex items-center border-b-2 border-transparent px-1 pt-1 pb-2 text-base font-medium text-gray-600 hover:border-gray-600 hover:text-gray-800">
                                Money Advice <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                        <div class="submenu hidden absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <a href="{{ route('content.how-to-stop-impulse-spending') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">How to Stop Impulse Spending</a>
                            <a href="{{ route('content.good-money-habits') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Good Money Habits</a>
                            <a href="{{ route('content.signs-you-are-good-with-money') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Signs you’re good with money</a>
                            <a href="{{ route('content.teaching-kids-about-budgeting') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Budgeting for Kids</a>
                            <a href="{{ route('content.money-and-budgeting-for-teenagers') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Money and Budgeting for Teenagers</a>
                            <a href="{{ route('content.budgeting-tips-for-students') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Student Budgeting Tips</a>
                        </div>
                    </div>

                    <div id="features" class="relative">
                        @if ($active_route === 'features')
                            <button type="button" class="submenu-toggle flex inline-flex items-center border-b-2 border-pinky-200 px-1 pt-1 pb-2 text-base font-medium text-pinky-900">
                                Features <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <button type="button" class="submenu-toggle flex inline-flex items-center border-b-2 border-transparent px-1 pt-1 pb-2 text-base font-medium text-gray-600 hover:border-gray-600 hover:text-gray-800">
                                Features <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                        <div class="submenu hidden absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <a href="{{ route('content.getting-started') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Getting Started</a>
                            <a href="{{ route('content.workflow') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Workflow</a>
                        </div>
                    </div>

                    <div id="about" class="relative">
                        @if ($active_route === 'about')
                            <button type="button" class="submenu-toggle flex inline-flex items-center border-b-2 border-pinky-200 px-1 pt-1 pb-2 text-base font-medium text-pinky-900">
                                About Us <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <button type="button" class="submenu-toggle flex inline-flex items-center border-b-2 border-transparent px-1 pt-1 pb-2 text-base font-medium text-gray-600 hover:border-gray-600 hover:text-gray-800">
                                About Us <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                        <div class="submenu hidden absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <a href="{{ route('content.our-team') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Our Team</a>
                            <a href="{{ route('content.our-budgeting-story') }}" class="block border-l-2 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">Our Budgeting Story</a>
                        </div>
                    </div>
                </div>
            </div>
            @if ($active_route !== 'landing')
                <div class="hidden sm:ml-4 sm:flex space-x-4 flex items-center">
                    @auth
                        <a href="{{ route('auth.sign-out.action') }}" class="bg-black px-1.5 py-1 md:px-2 md:py-1.5 rounded-md text-base font-medium text-white hover:bg-gray-700">Sign-out</a>
                    @else
                        <a href="{{ route('auth.sign-in') }}" class="bg-pinky-500 px-1.5 py-1 md:px-2 md:py-1.5 rounded-md text-base font-medium text-white hover:bg-pinky-700">Sign-in</a>
                        <a href="{{ route('auth.register') }}" class="bg-black px-1.5 py-1 md:px-2 md:py-1.5 rounded-md text-base font-medium text-white hover:bg-gray-700">Register</a>
                    @endif
                </div>
            @endif
            <div class="-mr-2 flex items-center sm:hidden">
                <button type="button" id="navbar-mobile-menu-toggle" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pinky-300" aria-controls="navbar-mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg id="navbar-mobile-menu-toggle-open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg id="navbar-mobile-menu-toggle-close" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="sm:hidden hidden" id="navbar-mobile-menu">
        <div class="space-y-1 pt-2 pb-3">
            @if ($active_route === 'landing')
                <a href="{{ route('landing') }}" class="block border-l-4 border-pinky-500 py-2 pl-3 pr-4 text-base font-medium text-pinky-900">Budget Pro</a>
            @else
                <a href="{{ route('landing') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-700">Budget Pro</a>
            @endif

            @if($active_route === 'budgeting')
                <span class="block border-l-4 border-pinky-500 py-2 pl-3 pr-4 text-base font-medium text-pinky-900">Budgeting</span>
            @else
                <span class="block ml-1 py-2 pl-3 pr-4 text-base font-medium text-black">Budgeting</span>
            @endif
            <a href="{{ route('content.what-is-budgeting') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- What is Budgeting?</span>
            </a>
            <a href="{{ route('content.why-is-budgeting-important') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Why is Budgeting Important?</span>
            </a>
            <a href="{{ route('content.reasons-to-start-budgeting') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Reasons to Start Budgeting?</span>
            </a>
            <a href="{{ route('content.how-to-start-budgeting') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- How to Start Budgeting</span>
            </a>
            <a href="{{ route('content.budgeting-myths') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Budgeting Myths</span>
            </a>
            <a href="{{ route('content.budgeting-q-and-a') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Budgeting Q&A's</span>
            </a>

            @if($active_route === 'money-advice')
                <span class="block border-l-4 border-pinky-500 py-2 pl-3 pr-4 text-base font-medium text-pinky-900">Money Advice</span>
            @else
                <span class="block ml-1 py-2 pl-3 pr-4 text-base font-medium text-black">Money Advise</span>
            @endif
            <a href="{{ route('content.how-to-stop-impulse-spending') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- How to Stop Impulse Spending</span>
            </a>
            <a href="{{ route('content.good-money-habits') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Good Money Habits</span>
            </a>
            <a href="{{ route('content.signs-you-are-good-with-money') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Signs you’re Good with Money</span>
            </a>
            <a href="{{ route('content.teaching-kids-about-budgeting') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Budgeting for Kids</span>
            </a>
            <a href="{{ route('content.money-and-budgeting-for-teenagers') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Money and Budgeting for Teenagers</span>
            </a>
            <a href="{{ route('content.budgeting-tips-for-students') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Student Budgeting Tips</span>
            </a>

            @if($active_route === 'features')
                <span class="block border-l-4 border-pinky-500 py-2 pl-3 pr-4 text-base font-medium text-pinky-900">Features</span>
            @else
                <span class="block ml-1 py-2 pl-3 pr-4 text-base font-medium text-black">Features</span>
            @endif
            <a href="{{ route('content.getting-started') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Getting Started</span>
            </a>
            <a href="{{ route('content.workflow') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Workflow</span>
            </a>
            <a href="{{ route('content.faqs') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Budget Pro: FAQs</span>
            </a>

            @if($active_route === 'about')
                <span class="block border-l-4 border-pinky-500 py-2 pl-3 pr-4 text-base font-medium text-pinky-900">Support</span>
            @else
                <span class="block ml-1 py-2 pl-3 pr-4 text-base font-medium text-black">About Us</span>
            @endif
            <a href="{{ route('content.our-team') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Our Team</span>
            </a>
            <a href="{{ route('content.our-budgeting-story') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Our Budgeting Story</span>
            </a>

            @if($active_route === 'support')
                <span class="block border-l-4 border-pinky-500 py-2 pl-3 pr-4 text-base font-medium text-pinky-900">Support</span>
            @else
                <span class="block ml-1 py-2 pl-3 pr-4 text-base font-medium text-black">Support</span>
            @endif
            <a href="{{ route('roadmap') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Roadmap</span>
            </a>
            <a href="{{ route('privacy-policy') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Privacy Policy</span>
            </a>
            <a href="{{ route('terms-of-service') }}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-600 hover:bg-gray-100 hover:text-gray-800">
                <span class="pl-2">- Terms of Service</span>
            </a>
        </div>

        <div class="border-t border-gray-200 pb-3">
            <div class="mt-3 space-x-2 p-3">
                @auth
                    <a href="{{ route('auth.sign-out.action') }}" class="bg-black px-4 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Sign-out</a>
                @else
                    <a href="{{ route('auth.sign-in') }}" class="bg-pinky-500 px-4 py-2 rounded-md text-base font-medium text-white hover:bg-pinky-700">Sign-in</a>
                    <a href="{{ route('auth.register') }}" class="bg-black px-4 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Register</a>
                @endif
            </div>
        </div>
    </div>
</nav>

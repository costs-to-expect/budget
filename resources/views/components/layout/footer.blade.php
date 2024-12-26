<footer class="bg-gray-50 border-t-2 pt-6" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl pb-12 px-4 sm:px-6 lg:pb-16 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-base font-medium text-lg text-gray-900">Costs to Expect</h3>
                <ul role="list" class="mt-2 space-y-4">
                    <li>
                        <x-helper.control.link.text route="https://api.costs-to-expect.com" label="API" />
                    </li>
                    <li>
                        <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com" label="Budget Pro" />
                    </li>

                    <li>
                        <x-helper.control.link.text route="https://budget.costs-to-expect.com" label="Budget" />
                    </li>

                    <li>
                        <x-helper.control.link.text route="https://status.costs-to-expect.com" label="Service Status" />
                    </li>

                    <li>
                        <x-helper.control.link.text route="https://github.com/costs-to-expect" label="GitHub" />
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-base font-medium text-lg text-gray-900">Budgeting</h3>
                <ul role="list" class="mt-2 space-y-4">
                    <li>
                        <x-helper.control.link.text :route="route('what-is-budgeting')" label="What is Budgeting?" />
                    </li>
                    <li>
                        <x-helper.control.link.text :route="route('why-is-budgeting-important')" label="Why is budgeting important?" />
                    </li>
                    <li>
                        <x-helper.control.link.text :route="route('reasons-to-start-budgeting')" label="Reasons to start Budgeting?" />
                    </li>
                    <li>
                        <x-helper.control.link.text route="https://budget-pro.costs-to-expect.com/how-to-start-budgeting')" label="How to start Budgeting?" />
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-base font-medium text-lg text-gray-900">Powered by our API</h3>
                <ul role="list" class="mt-2 space-y-4">
                    <li>
                        <x-helper.control.link.text route="https://www.costs-to-expect.com" label="Social Experiment" />
                    </li>

                    <li>
                        <x-helper.control.link.text route="https://yahtzee.game-scorer.com" label="Yahtzee Game Scorer" />
                    </li>

                    <li>
                        <x-helper.control.link.text route="https://yatzy.game-scorer.com" label="Yatzy Game Scorer" />
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-base font-medium text-lg text-gray-900">Support</h3>

                <p class="mt-2 mb-2 text-sm text-gray-800">
                    <x-helper.control.link.text route="https://www.deanblackborough.com" label="Dean Blackborough" /> &copy; 2018-2024
                </p>
                <p class="mb-2 text-sm text-gray-800">{{ $version }}<br />
                    Released {{ $release_date }}
                </p>
                <p class="text-sm text-gray-800">
                    Contact via mail at
                    <a href="mailto:support@costs-to-expect.com" class="text-pinky-500 hover:text-pinky-900">support@costs-to-expect.com</a>
                </p>
            </div>
        </div>
    </div>
</footer>
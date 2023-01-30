<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-html-head title="Budget vs Budget Pro" description="How do Budget and Budget Pro, what are the differences between the two versions, check the table to see all the features" />
    <body>

        @auth
        <x-offcanvas active="getting-started"/>
        @else
        <header class="site-header sticky-top py-1">
            <x-api-status />
            <x-navbar active="versions" />
        </header>
        @endauth

        <div class="col-lg-8 mx-auto p-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-4 mt-3 mb-3">Budget and Budget Pro</h2>

                    <p class="lead"><a href="https://budget-pro.costs-to-expect.com">Budget Pro</a> is in development and we hope to have it released within the first
                        half of 2023. Please review the table below to see how Budget and Budget Pro compare
                    </p>

                    <p class="lead mb-0">The tables below detail some of the features planned for Budget Pro.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mx-auto p-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="display-6 mb-3">What are the limits for each version?</h3>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="bg-dark text-light">
                                <th scope="col">Feature</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Budget <span class="badge rounded-pill text-bg-income">Pro</span></th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">Number of Budgets</th>
                                <td>1</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <th scope="row">Number of Projection Accounts</th>
                                <td>3</td>
                                <td>Unlimited</td>
                            </tr>
                            <tr>
                                <th scope="row">Number of Budget Items</th>
                                <td>100</td>
                                <td>Unlimited</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="display-6 mt-3 mb-3">Can I share my Budget?</h3>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="bg-dark text-light">
                                <th scope="col">Feature</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Budget <span class="badge rounded-pill text-bg-income">Pro</span></th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">Share Budgets</th>
                                <td>No</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <th scope="row">Sharing Limit</th>
                                <td>N/A</td>
                                <td>Unlimited <span class="text-muted small">Everyone sharing needs a Pro account</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="display-6 mt-3 mb-3">General Features</h3>

                    <p class="lead">We can't guarantee every feature will be available upon release. If a feature
                        has an asterisk * next to it, it might not be in the initial release but
                        be assured we will be working on it.
                    </p>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="bg-dark text-light">
                                <th scope="col">Feature</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Budget <span class="badge rounded-pill text-bg-income">Pro</span></th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">Open Source</th>
                                <td>Yes <span class="text-muted small">MIT License</span></td>
                                <td>No</td>
                            </tr>
                            <tr>
                                <th scope="row">Open Banking support</th>
                                <td>No</td>
                                <td>Planned <span class="text-muted small">First priority after the release of the Budget Pro beta</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Fixed Budget Item Amounts</th>
                                <td>Yes</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <th scope="row">Range-based Budget Item Amounts</th>
                                <td>No</td>
                                <td>Yes <span class="text-muted small">e.g. &pound;35-45 per week</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Disable Budget Items</th>
                                <td>Yes</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <th scope="row">Copy a Budget *</th>
                                <td>No</td>
                                <td>Yes <span class="text-muted small">Copy an entire Budget</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Copy Budget Items *</th>
                                <td>No</td>
                                <td>Yes <span class="text-muted small">Useful for faster data entry</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Ad-Hoc Budget Items Adjustments</th>
                                <td>Yes</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <th scope="row">Supported Ad-Hoc Adjustments</th>
                                <td>Amount</td>
                                <td>Amount, Exclusions</td>
                            </tr>
                            <tr>
                                <th scope="row">Currencies Supported</th>
                                <td>GBP, USD, EUR, CAD, AUD, NZD & INR</td>
                                <td>GBP, USD, EUR, CAD, AUD, NZD & INR</td>
                            </tr>
                            <tr>
                                <th scope="row">Currencies per Budget</th>
                                <td>1</td>
                                <td>3 <span class="text-muted small">Multiple currencies supported on a Budget</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Budget Item Frequencies</th>
                                <td>Annually, Monthly & One-Off</td>
                                <td>Daily, Weekly, Fortnightly, Annually, Monthly & One-Off</td>
                            </tr>
                            <tr>
                                <th scope="row">Budget Item Exclusions</th>
                                <td>Months for Monthly frequencies</td>
                                <td>As per Budget & Weekends, Holidays, move forward/backward</td>
                            </tr>
                            <tr>
                                <th scope="row">Search Budget Items</th>
                                <td>Search by name</td>
                                <td>Search on any field</td>
                            </tr>
                            <tr>
                                <th scope="row">Multiple Edit *</th>
                                <td>No</td>
                                <td>Yes</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="display-6 mt-3 mb-3">Viewing Features</h3>

                    <p class="lead">We can't guarantee every feature will be available upon release. If a feature
                        has an asterisk * next to it, it might not be in the initial release but
                        be assured we will be working on it.
                    </p>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="bg-dark text-light">
                                <th scope="col">Feature</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Budget <span class="badge rounded-pill text-bg-income">Pro</span></th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">Set Timezone</th>
                                <td>No</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <th scope="row">Set Date Format</th>
                                <td>No</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <th scope="row">Define Colours for Categories *</th>
                                <td>No</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <th scope="row">Number of Visible Months on Budget</th>
                                <td>3</td>
                                <td>3, 6, or 12</td>
                            </tr>
                            <tr>
                                <th scope="row">Customise Expense Bars *</th>
                                <td>No</td>
                                <td>Yes</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mx-auto p-3">
            <div class="row">
                <div class="col-12">
                    <x-footer />
                </div>
            </div>
        </div>

        <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}" defer></script>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

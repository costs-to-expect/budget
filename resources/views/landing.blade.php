<!doctype html>
<html lang="en">
    <x-html-head title="Budget by Costs to Expect" description="A budgeting tool so easy to use, it’s child play!" />
    <body>

    <header class="site-header sticky-top py-1">
        <x-api-status />
        <x-navbar />
    </header>

    <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-6 p-lg-6 mx-auto my-5">
                <h1 class="display-1 fw-normal">Budget</h1>
                <h2 class="display-5">A budgeting tool so easy to use, it’s child play!</h2>
                <p class="lead fw-normal">A <span class="badge rounded-pill text-bg-income">free</span> open source budgeting tool<br />
                    powered by the <a href="https://github.com/costs-to-expect/api">Costs to Expect API</a>.</p>
                <p class="lead fw-normal">If you need to collaborate or have more advanced budgeting requirements <a href="{{ route('version-compare') }}">Budget Pro</a> might
                    be more suitable for you. Budget Pro is currency in alpha and is free to use during the alpha and beta period.</p>
                <a href="https://budget-pro.costs-to-expect.com" class="btn btn-primary" title="Register an account with Costs to Expect">Try Budget Pro</a>
                <a href="{{ route('register.view') }}" class="btn btn-primary" title="Register an account with Costs to Expect">Register for free</a>
                <a href="{{ route('sign-in.view') }}" class="btn btn-outline-primary" title="Sign in with your Costs to Expect account">Sign-in</a>

                <p class="mt-3 fw-normal">Please reach out to us on <a href="https://twitter.com/coststoexpect">Twitter</a> if you want to migrate from Budget to Budget Pro.</p>
            </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
            <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Simple</h2>
                    <p class="lead">Our overview is so clear and simple, a child could manage your budget.
                        We wouldn’t recommend it, but you get the idea.</p>
                </div>
                <div class="bg-light shadow-sm mx-auto"
                     style="width: 80%; border-radius: 6px 6px 0 0;">
                    <img src="{{ asset('images/landing/budget-overview.png') }}" width="390" height="725" alt="Budget overview screen, shows expenses for each month" class="img-fluid" />
                </div>
            </div>
            <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Projections</h2>
                    <p class="lead">Input your income and outgoings to see projected balances and savings for the months
                        and years ahead. Handy, right?</p>
                </div>
                <div class="bg-dark shadow-sm mx-auto"
                     style="width: 80%; border-radius: 6px 6px 0 0;">
                    <img src="{{ asset('images/landing/view-projections.png') }}" width="390" height="725" alt="Budget overview screen, shows projections for each account" class="img-fluid" />
                </div>
            </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
            <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Open Source</h2>
                    <p class="lead"><a href="https://github.com/costs-to-expect/budget/blob/main/LICENSE">Budget</a> and the <a href="https://github.com/costs-to-expect/api/blob/master/LICENSE">API</a> are open source. That means we're not hiding anything -
                        you are always free to see how your data is transmitted and saved.</p>
                </div>
                <div class="bg-light shadow-sm mx-auto"
                     style="width: 80%; border-radius: 6px 6px 0 0;">
                    <img src="{{ asset('images/landing/open-source.png') }}" width="256" height="" alt="Budget & the Costs to Expect API are Open Source, MIT License" class="img-fluid" />
                </div>
            </div>
            <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Powerful</h2>
                    <p class="lead">The Costs to Expect <a href="https://github.com/costs-to-expect/api">API</a> is powerful - we designed it knowing we were going
                        to use it for a variety of different projects.</p>
                </div>
                <div class="bg-dark shadow-sm mx-auto"
                     style="width: 80%; border-radius: 6px 6px 0 0;">
                    <img src="{{ asset('images/landing/api.png') }}" width="256" height="" alt="The Costs to Expect API is powerful and powers all our Apps" class="img-fluid" />
                </div>
            </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
            <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Detail</h2>
                    <p class="lead">We only show you the data you need but behind the scenes we have all the detail,
                        expenses can be as complex as you like.</p>
                </div>
                <div class="bg-light shadow-sm mx-auto"
                     style="width: 80%; border-radius: 6px 6px 0 0;">
                    <img src="{{ asset('images/landing/detail-view.png') }}" width="390" height="725" alt="Budget detail screen, show expense details" class="img-fluid" />
                </div>
            </div>
            <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Exclusions</h2>
                    <p class="lead">We understand that not all expenses are monthly - we provide the tools to set exclusions,
                        ensuring your budget is completely customisable and up-to-date.</p>
                </div>
                <div class="bg-dark shadow-sm mx-auto"
                     style="width: 80%; border-radius: 6px 6px 0 0;">
                    <img src="{{ asset('images/landing/set-exclusions.png') }}" width="390" height="725" alt="Budget exclusions screen, show that monthly exclusions can be set for monthly expenses" class="img-fluid" />
                </div>
            </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
            <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Your Data</h2>
                    <p class="lead">You can use our app or access your data directly via the <a href="https://github.com/costs-to-expect/api">API</a>, we don't mind
                        how you use our tools.</p>
                </div>
            </div>
            <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Full Control</h2>
                    <p class="lead">We hope it won't happen but if you want to leave us, it's easy and immediate. We provide
                        the tools to allow you to export and delete your data there and then.</p>
                </div>
            </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
            <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Dogfooding</h2>
                    <p class="lead">We're using our own products every day so if there's a feature that bugs you,
                        chances are we're already working on improvements.</p>
                    <p class="text-muted small"><a href="https://en.wikipedia.org/wiki/Eating_your_own_dog_food">Dogfooding</a> on Wikipedia</p>
                </div>
            </div>
            <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Free</h2>
                    <p class="lead">Simple budgeting should be <strong>free</strong>* and easy and our aim is to keep Budget free for as long
                        as we possibly can. The App is funded by the API and Budget Pro.</p>
                    <p class="text-muted small">
                        *We reserve the right to change this if sheer number of users make this unviable for us (But we promise to do our best!)
                    </p>
                </div>
            </div>
        </div>

    </main>

    <x-footer />

    <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}" defer></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>

    </body>
</html>

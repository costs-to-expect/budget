<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-html-head title="Budget: Privacy Policy" description="Read our privacy policy" />
    <body>

        @auth
        <x-offcanvas active="privacy-policy"/>
        @else
        <header class="site-header sticky-top py-1">
            <x-api-status />
            <x-navbar active="support"/>
        </header>
        @endauth

        <div class="col-lg-8 col-xl-6 mx-auto p-3">

            <div class="row">
                <div class="col-12">
                    <h2 class="display-5 mt-3 mb-3">Privacy Policy</h2>

                    <p class="lead">
                        Your privacy is important to us. It is our policy to respect your privacy regarding any
                        information we may collect from you across our <a href="https://budget.costs-to-expect.com">website</a>,
                        and other sites in the Costs to Expect service that we own and operate.
                    </p>
                    <p class="lead">
                        We only ask for personal information when we truly need it to provide a service to you.
                        We collect it by fair and lawful means, with your knowledge and consent. We also let you
                        know why we’re collecting it and how it will be used.
                    </p>
                    <p class="lead">
                        We only retain collected information for as long as necessary to provide you with your
                        requested service. Any data that we store will be protected within commercially acceptable
                        means to prevent loss and theft, as well as unauthorised access, disclosure, copying, use
                        or modification.
                    </p>
                    <p class="lead">
                        We don’t share any personally identifying information publicly or with third-parties, except
                        when required to by law.
                    </p>
                    <p class="lead">
                        Our website may link to external sites that are not operated by us. Please be aware that
                        we have no control over the content and practices of these sites, and cannot accept
                        responsibility or liability for their respective privacy policies.
                    </p>
                    <p class="lead">
                        You are free to refuse our request for your personal information, with the understanding
                        that we may be unable to provide you with some of your desired services.
                    </p>
                    <p class="lead">
                        Your continued use of our website will be regarded as acceptance of our practices around
                        privacy and personal information. If you have any questions about how we
                        handle user data and personal information, feel free to contact us.
                    </p>
                    <p>
                        This policy is effective as of the 12th January 2023.
                    </p>
                </div>
            </div>

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}" defer></script>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

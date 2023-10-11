<footer class="container py-5">
    <div class="row">
        <div class="col-6 col-md-3">
            <h5>Support</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-primary" href="{{ route('getting-started') }}" title="Checkout the Getting Started page">Getting Started</a></li>
                <li><a class="link-primary" href="{{ route('workflow') }}" title="Checkout the Workflow page">Workflow</a></li>
                <li><a class="link-primary" href="{{ route('faqs') }}" title="Read our FAQs">FAQs</a></li>
                <li><a class="link-primary" href="{{ route('privacy-policy') }}" title="Read our Privacy Policy">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-3">
            <h5>Budgeting</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-primary" href="{{ route('what-is-budgeting') }}" title="What is Budgeting?">What is Budgeting?</a></li>
                <li><a class="link-primary" href="{{ route('how-to-start-budgeting')  }}" title="How to Start Budgeting?">How to Start Budgeting?</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-3">
            <h5>Powered by our API</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-primary" href="https://www.costs-to-expect.com" title="What does it cost to raise a child to 18 in the UK">Social Experiment</a></li>
                <li><a class="link-primary" href="https://yahtzee.game-scorer.com" title="Game scorer for Yahtzee">Yahtzee Game Scorer</a></li>
                <li><a class="link-primary" href="https://yatzy.game-scorer.com" title="Game scorer for Yatzy">Yatzy Game Scorer</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-3">
            <h5>Costs to Expect</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-primary" href="https://api.costs-to-expect.com" title="The Costs to Expect API">API</a></li>
                <li><a class="link-primary" href="https://budget.costs-to-expect.com" title="Budget by Costs to Expect">Budget</a></li>
                <li><a class="link-primary" href="https://budget-pro.costs-to-expect.com" title="Budget Pro by Costs to Expect">Budget Pro</a></li>
                <li><a class="link-primary" href="https://app.costs-to-expect.com" title="Expense by Costs to Expect">Expense</a></li>
                <li><a class="link-primary" href="https://status.costs-to-expect.com" title="Service Status for Costs to Expect">Service Status</a></li>
                <li><a class="link-primary" href="https://blog.costs-to-expect.com" title="View the Costs to Expect blog">Our Blog</a></li>
                <li><a class="link-primary" href="https://github.com/costs-to-expect" title="Visit Costs to Expect on GitHub">GitHub</a></li>
            </ul>
        </div>
        <div class="col-12">
            <small class="d-block mb-1 text-muted">
                &copy; 2018-{{ date('Y') }} <a class="link-primary" href="https://www.deanblackborough.com" title="View my blog">Dean Blackborough</a>
            </small>
            <small class="d-block mb-1 text-muted">
                {{ $version }} released {{ $release_date }}
            </small>
            <small class="d-block mb-3 text-muted">
                Code Licensed <a href="https://github.com/costs-to-expect/budget/blob/main/LICENSE" title="View the license on GitHub">MIT</a>
            </small>
            <small class="d-block mb-3 text-muted">
                Contact via email @ <a href="mailto:support@costs-to-expect.com" title="Email us @ support@costs-to-expect.com">support@costs-to-expect.com</a>
            </small>
        </div>
    </div>
</footer>
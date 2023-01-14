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
                <li><a class="link-primary" href="" title="Checkout the Getting Started page">Page 1</a></li>
                <li><a class="link-primary" href="" title="Checkout the Workflow page">Page 2</a></li>
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
            <small class="d-block mb-1 text-muted">&copy; 2018-{{ date('Y') }} <a class="link-primary" href="https://www.deanblackborough.com" title="View my blog">Dean Blackborough</a></small>
            <small class="d-block mb-1 text-muted">{{ $version }} released {{ $release_date }}</small>
            <small class="d-block mb-3 text-muted">Code Licensed <a href="https://github.com/costs-to-expect/budget/blob/main/LICENSE" title="View the license on GitHub">MIT</a></small>
            <small class="d-block mb-3 text-muted">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg>
                <a href="https://twitter.com/coststoexpect" title="Follow us on Twitter">Follow</a> us on Twitter &copy;<br />
            </small>
        </div>
    </div>
</footer>
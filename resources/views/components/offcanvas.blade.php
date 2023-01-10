<nav class="navbar navbar-dark bg-dark" aria-label="Offcanvas navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            Budget by <img src="{{ asset('images/logo.png') }}" width="32" height="32" class="d-inline-block align-middle" alt=""><span class="d-none">C</span>osts to Expect.com
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark" title="Open the menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel">Budget</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close" title="Close the menu"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'home') active @endif" href="{{ route('home') }}" title="View Your Budget">Your Budget</a>

                        <ul class="navbar-nav justify-content-end flex-grow-1 ps-4 pe-3">
                            <li class="nav-item">
                                <a class="nav-link @if($active === 'budget.item.list') active @endif" href="{{ route('budget.item.list') }}" title="View list of budget items">Budget Items</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'getting-started') active @endif" href="{{ route('getting-started') }}" title="Visit our Getting Started page">Getting Started</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'workflow') active @endif" href="{{ route('workflow') }}" title="Visit our Workflow page">Workflow</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'faqs') active @endif" href="{{ route('faqs') }}" title="Read our FAQs">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'account') active @endif" href="{{ route('account.index') }}" title="Visit Your Account">Your Account</a>

                        <ul class="navbar-nav justify-content-end flex-grow-1 ps-4 pe-3">
                            <li class="nav-item">
                                <a class="nav-link @if($active === 'account.update-profile') active @endif" href="{{ route('account.update-profile') }}" title="Update your profile">Update Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($active === 'account.change-password') active @endif" href="{{ route('account.change-password') }}" title="Change your account password">Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($active === 'account.reset') active @endif" href="{{ route('account.reset') }}" title="Reset the Budget App">Reset App</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($active === 'account.delete-budget-account') active @endif" href="{{ route('account.delete-budget-account') }}" title="Delete my Budget account App">Delete Budget Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($active === 'account.delete-account') active @endif" href="{{ route('account.delete-account') }}" title="Delete my Costs to Expect App">Delete Costs to Expect Account</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'privacy-policy') active @endif" href="{{ route('privacy-policy') }}" title="Read our Privacy Policy">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('sign-out') }}" title="Sign-out of Budget">Sign-out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
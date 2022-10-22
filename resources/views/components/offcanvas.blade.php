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
                        <a class="nav-link @if($active === 'home') active @endif" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'getting-started') active @endif" href="{{ route('getting-started') }}">Getting Started</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'workflow') active @endif" href="{{ route('workflow') }}">Workflow</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'faqs') active @endif" href="{{ route('faqs') }}">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'account') active @endif" href="{{ route('account.index') }}">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'account.update-profile') active @endif" href="{{ route('account.update-profile') }}">Update Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active === 'account.change-password') active @endif" href="{{ route('account.change-password') }}">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('sign-out') }}">Sign-out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
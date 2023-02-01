    <nav class="container-fluid d-flex navbar-dark bg-dark">
        <a class="navbar-brand p-0 me-0 me-lg-2" href="{{ route('landing') }}" aria-label="Budget by Costs to Expect">
            <img src="{{ asset('images/logo.png') }}" alt="Costs to Expect Logo" width="40" height="40" title="Costs to Expect" />
        </a>
        <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
            <li class="nav-item px-1">
                <a class="nav-link py-2 px-1 px-lg-2 @if($active === 'versions') active @endif" href="{{ route('version-compare') }}">Versions</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link py-2 px-1 px-lg-2 @if($active === 'budgeting') active @endif dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Budgeting
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('what-is-budgeting') }}">What is Budgeting?</a></li>
                    <li><a class="dropdown-item" href="{{ route('how-to-start-budgeting') }}">How to Start Budgeting</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link py-2 px-1 px-lg-2 @if($active === 'support') active @endif dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Support
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('getting-started') }}">Getting Started</a></li>
                    <li><a class="dropdown-item" href="{{ route('workflow') }}">Workflow</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('help.add-expense') }}">How do I add an expense item?</a></li>
                    <li><a class="dropdown-item" href="{{ route('help.add-income') }}">How do I add an income item?</a></li>
                    <li><a class="dropdown-item" href="{{ route('help.add-savings') }}">How do I add a savings item?</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('faqs') }}">FAQs</a></li>
                    <li><a class="dropdown-item" href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                </ul>
            </li>
        </ul>
    </nav>
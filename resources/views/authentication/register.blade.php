<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
    <meta name="author" content="Dean Blackborough">
    <title>Budget: Register</title>
    <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
    <x-open-graph />
    <x-twitter-card />
    <style>
        .site-header {
            background-color: #000000;
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            backdrop-filter: saturate(180%) blur(20px);
        }
    </style>
</head>
<body>
    <header class="site-header sticky-top py-1">
        <nav class="container-fluid d-flex navbar-dark">
            <a class="navbar-brand p-0 me-0 me-lg-2" href="{{ route('landing') }}" aria-label="Budget by Costs to Expect">
                <img src="{{ asset('images/logo.png') }}" alt="Costs to Expect Logo" width="40" height="40" title="Costs to Expect" />
            </a>
            <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                <li class="nav-item px-1">
                    <a class="nav-link py-2 px-1 px-lg-2" href="{{ route('version-compare') }}">Versions</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link py-2 px-1 px-lg-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Budgeting
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Page 1</a></li>
                        <li><a class="dropdown-item" href="">Page 2</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link py-2 px-1 px-lg-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    </header>
    <div class="container-fluid pt-5">
        <div class="row d-flex align-items">
            <div class="col-12">
                <div class="header text-center">
                    <h1 class="display-1">Budget</h1>
                    <h2 class="display-6">Simplified Budgeting</h2>
                    powered by <a href="https://api.costs-to-expect.com">
                        <img src="{{ asset('images/logo.png') }}" width="64" height="64" alt="Costs to Expect Logo" title="Powered by the Costs to Expect API">
                        <span class="d-none">C</span>osts to Expect API
                    </a>
                </div>

                <form action="{{ route('register.process') }}" method="POST" class="col-12 col-md-4 col-lg-3 mx-auto p-2">

                    @csrf

                    <h4 class="text-center">Create an Account</h4>

                    @if ($failed !== null)
                        <p class="alert alert-danger">We were unable to create your account, the API returned the
                            following error "{{ $failed }}". Please check our <a href="https://status.costs-to-expect.com">status</a>
                            page and try again later.</p>
                    @endif

                    <div class="mt-3 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @if($errors !== null && array_key_exists('name', $errors)) is-invalid @endif" id="name" aria-describedby="name-help" required value="{{ old('name') }}" />
                        <div id="name-help" class="form-text">Please enter a name, <em>any name will do</em>.</div>
                        @if($errors !== null && array_key_exists('name', $errors))
                            <div class="invalid-feedback">
                                @foreach ($errors['name'] as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="mt-3 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @if($errors !== null && array_key_exists('email', $errors)) is-invalid @endif" id="email" aria-describedby="email-help" required value="{{ old('email') }}" />
                        <div id="email-help" class="form-text">Please enter your email address, <em>we will never share
                                your email address</em>.</div>
                        @if($errors !== null && array_key_exists('email', $errors))
                            <div class="invalid-feedback">
                                @foreach ($errors['email'] as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <p>By registering and using Budget you are agreeing to our <a href="{{ route('privacy-policy') }}">Privacy Policy</a>.
                            Please read this carefully before registering although the short story is we will never share your
                            data with anyone, and we do not track you.</p>

                        <p>Budget is an Open Source project, if you have any doubts about our intentions, please review
                            or ask someone to review the code on <a class="link-primary" href="https://github.com/costs-to-expect" title="Visit Costs to Expect on GitHub">GitHub</a>.</p>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" title="Register with Costs to Expect">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}" defer></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
</body>
</html>

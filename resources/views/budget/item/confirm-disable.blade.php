<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Expense/Income Details</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-8 mx-auto p-3">

            <div class="col-12 col-md-6 col-lg-5 mx-auto p-2">

                <div class="row budget-item shadow p-3 g-3 mt-2">
                    <div class="col-12">
                        <h2 class="display-6">
                            <a class="btn btn-sm btn-primary text-end" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>
                            Budget Item
                        </h2>
                    </div>

                    <div class="col-12">
                        <div class="alert alert-dark mt-2" role="alert">
                            <h4 class="alert-heading">Disable</h4>
                            <p>If you are sure you want to disable this item please click the button below.</p>
                            <p>When you disable an item, it will display on your budget but it won't be included in
                                any calculations.</p>
                            <hr>
                            <a class="btn btn-sm btn-dark" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                                    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                </svg>
                                Disable
                            </a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="label">Name</div>
                        Council Tax
                    </div>
                    <div class="col-6">
                        <div class="label">Account</div>
                        Default
                    </div>
                    <div class="col-12">
                        <div class="label">Description</div>
                        N/A
                    </div>
                    <div class="col-6">
                        <div class="label">Start Date</div>
                        01/04/2004
                    </div>
                    <div class="col-6">
                        <div class="label">End Date</div>
                        No end date
                    </div>
                    <div class="col-12">
                        <div class="label">Amount & Type</div>
                        <small>&pound;</small>163.00 <span class="badge text-bg-fixed">Fixed</span>
                    </div>

                    <div class="col-12">
                        <div class="label">Frequency</div>
                        Monthly around the 5th
                    </div>

                    <div class="col-12">
                        <div class="label">Frequency</div>
                        Annually around 5th September
                    </div>

                    <div class="col-12">
                        <div class="label">Exclusions</div>
                        Not required January & February
                    </div>

                    <div class="col-12 text-end">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('home') }}">
                            Cancel
                        </a>
                        <a class="btn btn-sm btn-dark" href="{{ route('budget.item.confirm-disable', ['item_id' => 'test']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                            </svg>
                            Disable
                        </a>
                        <a class="btn btn-sm btn-danger" href="{{ route('budget.item.confirm-delete', ['item_id' => 'test']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            Delete
                        </a>
                    </div>
                </div>
            </div>

            <x-budget
                    :accounts="$accounts"
                    :months="$months"
                    :pagination="$pagination"
                    :viewEnd="$view_end"
                    :active="true"
                    :projection="$projection"
                    :hasBudget="has_budget"/>

            <x-requests />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Confirm Delete</title>
        <link rel="icon" sizes="48x48" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet"/>
    </head>
    <body>

        <x-offcanvas active="home"/>

        <div class="col-lg-8 mx-auto p-3">

            <div class="row">
                <div class="col-12 col-lg-5 mx-auto p-2">
                    <div class="row budget-item g-3">
                        <div class="col-12">
                            <h2 class="display-5 mt-3 mb-3">
                                Budget Item
                            </h2>
                        </div>

                        <div class="col-12">
                            <div class="alert alert-danger mt-2" role="alert">
                                <h4 class="alert-heading">Delete</h4>
                                <p>If you are sure you want to delete this budget item, please use one of the options below.</p>
                                <p>If you click "Delete", we will set the end date for the item to today and it will be recoverable.</p>
                                <p>If you click "Delete & Discard", the item will be removed entirely and will not be recoverable.</p>
                                <p><strong>All instances</strong> of this budget item will be deleted.</p>
                                <hr>

                                <form action="{{ route('budget.item.confirm-delete.process', ['item_id' => $item['id']]) }}" method="POST" class="row g-2">

                                    @csrf

                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete the budget item">Delete</button>
                                        <button name="submit_and_discard" type="submit" class="btn btn-sm btn-danger" value="delete-and-discard" title="Delete and Discard the budget item">Delete & Discard</button>
                                        <a href="{{ route(
                                            'budget.item.view',
                                            [
                                                'item_id' => $item['id'],
                                                'year' => $selected_now_year,
                                                'month' => $selected_now_month,
                                                'item-year' => $item_year,
                                                'item-month' => $item_month
                                            ]
                                        ) }}" class="btn btn-sm btn-outline-primary" title="Return to budget item detail">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <x-budget-item
                            :accounts="$accounts"
                            :item="$item"
                            :itemYear="$item_year"
                            :itemMonth="$item_month"
                            :nowYear="$selected_now_year"
                            :nowMonth="$selected_now_month"
                            :adjustedAmount="$adjusted_amount"
                        />

                        <div class="col-12">
                            <div class="btn-group" role="group">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('home') }}" title="Return to Your Budget">
                                    Back
                                </a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('budget.item.update', ['item_id' => $item['id']]) }}" title="Update the budget item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                    Edit
                                </a>
                                <a class="btn btn-sm btn-outline-dark" href="{{ route('budget.item.confirm-disable', ['item_id' => $item['id']]) }}" title="Disable the budget item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                    </svg>
                                    Disable
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 p-2">
                    <x-budget
                        :accounts="$accounts"
                        :months="$months"
                        :pagination="$pagination"
                        :viewEnd="$view_end"
                        :projection="$projection"
                        :hasAccounts="$has_accounts"
                        :hasBudget="$has_budget"
                        :active_item="$item['id']"
                        :active_item_year="$item_year"
                        :active_item_month="$item_month" />
                </div>
            </div>

            <x-help />

            <x-requests :requests="$requests" />

            <x-footer />
        </div>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    </body>
</html>

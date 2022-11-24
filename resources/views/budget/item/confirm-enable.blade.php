<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Budget by Costs to Expect - Simplified Budgeting">
        <meta name="author" content="Dean Blackborough">
        <title>Budget: Confirm Enable</title>
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
                            <div class="alert alert-dark mt-2" role="alert">
                                <h4 class="alert-heading">Enable</h4>
                                <p>If you are sure you want to enable this budget item, please click the "Enable" button below.</p>
                                <p>When you enable the budget item it will immediately be included in your projections.</p>
                                <p><strong>All instances</strong> of this budget item will be enabled.</p>
                                <hr>

                                <form action="{{ route('budget.item.confirm-enable.process', ['item_id' => $item['id']]) }}" method="POST" class="row g-2">

                                    @csrf

                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-sm btn-dark" title="Enable the budget item">Enable</button>
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
                                <a class="btn btn-sm btn-outline-danger" href="{{ route('budget.item.confirm-delete', ['item_id' => $item['id']]) }}" title="Delete the budget item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                    Delete
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
                        :hasSavingsAccount="$has_savings_account"
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
        <script src="{{ asset('js/filter-budget.js') }}" defer></script>
    </body>
</html>

    <div class="row mt-3 budget-projections">
        <div class="col-12">
            <h2 class="display-6 mt-3 mb-3">Balances & Projections</h2>

            <div class="row">
                @foreach ($accounts as $__account)
                    <div class="col-12 border-bottom border-light pb-3 mb-3 budget-projections">
                        <h4 class="mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front ms-1" viewBox="0 0 16 16" style="color: {{ $__account->color() }}">
                                <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            {{ $__account->name() }}
                        </h4>
                        <div class="row">
                            <div class="col-6 balance">
                                <p class="mb-0">The current <br />account balance</p>
                                <small><x-currency :currency="$__account->currency()" /></small>{{ number_format($__account->balance(), 2) }}
                            </div>
                            @if ($projection === true)
                                <div class="col-6 balance text-end">
                                    <p class="mb-0">Projected balance end<br />
                                        {{ $view_end['month'] . ' ' . $view_end['year'] }}</p>
                                    <small><x-currency :currency="$__account->currency()" /></small>{{ number_format($__account->projected(), 2) }}
                                </div>
                            @else
                                <div class="col-6 balance text-end">
                                    <p class="mb-0">Project balance<br />not available</p>
                                    <small><x-currency :currency="$__account->currency()" /></small>{{ number_format($__account->balance(), 2) }}
                                </div>
                            @endif
                            <div class="col-12">
                                <a class="btn btn-sm btn-outline-primary px-1 py-0" href="{{ route('budget.account.set-balances') }}" title="Set account balances">
                                    Set Balances
                                </a>
                                <a class="btn btn-sm btn-outline-primary px-1 py-0" href="{{ route('budget.account.update', ['account_id' => $__account->id()]) }}" title="Edit account details">
                                    Edit Account
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-12 mt-2 text-end">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('budget.account.create') }}" title="Add a new account">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                New Account
            </a>
        </div>
    </div>
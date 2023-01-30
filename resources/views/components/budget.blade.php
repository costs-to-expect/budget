    <div class="row mt-3">
        @php $counter = 0; @endphp
        @foreach ($months as $__month)
            @if ($__month->visible())
            <div class="col-4 @if($counter === 1) border-start border-end border-primary border-opacity-50 @endif @if($__month->now()) bg-light @endif">
                <div class="text-primary text-center month pb-2">{{ $__month->name() }}<br />{{  $__month->year() }}</div>
                <div class="row">
                    @foreach ($__month->items() as $__item)
                        <a href="{{ route(
                                'budget.item.view', [
                                    'item_id' => $__item->id(),
                                    'item-year' => $__month->year(),
                                    'item-month' => $__month->month(),
                                    'month'=>  $__month->month(),
                                    'year'=> $__month->year()
                                ]) }}" class="budget-item" data-item-name="{{ $__item->name() }}" @if($__month->now() === true && $__item->paid() === true) data-item-paid=true @endif>
                        <div class="col-12 expense @if ($active_item === $__item->id() && $__month->year() === $active_item_year && $__month->month() === $active_item_month) active shadow @endif" @if($__item->disabled() === true) title="Disabled expense" @endif>
                            <div class="name text-grey" title="{{ $__item->name() }}">
                                <p class="mb-1">
                                    {{ $__item->name() }}
                                </p>
                            </div>
                            <div class="progress @if($__month->now()) border border-grey border-1 @endif @if($__item->disabled() === true || ($__month->now() === true && $__item->paid() === true)) opacity-25 @endif">
                                <div class="progress-bar bg-{{ $__item->category() }}" role="progressbar" aria-label="" style="width: {{ $__item->progressBarPercentage() }}%"
                                     aria-valuenow="{{ $__item->progressBarPercentage() }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="row">
                                <div class="col-3" title="{{ $__item->accountName() }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front float-start mt-1" viewBox="0 0 16 16" style="color: {{ $__item->accountColor() }}">
                                        <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                        <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </div>
                                <div class="col-9 amount text-grey text-end"><small><x-currency :currency="$__item->currency()" /></small>{{ number_format($__item->amount(), 2) }}
                                    @if ($__item->disabled() === true)
                                        <small class="text-dark disabled-expense">(Disabled)</small>
                                    @endif
                                    @if ($__month->now() === true && $__item->paid() === true)
                                        <small class="text-dark paid-expense">(Paid)</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @php $counter++; @endphp
            @endif
        @endforeach
    </div>

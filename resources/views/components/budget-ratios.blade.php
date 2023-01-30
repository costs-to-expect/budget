    <div class="row">
        @foreach ($months as $__month)
            @if ($__month->visible())
            <div class="col-4 mt-3">
                <div class="progress">
                    @foreach ($__month->summary()['categories'] as $__category => $__summary)
                    <div class="progress-bar bg-{{ $__category }}" role="progressbar"
                         aria-label="{{ ucfirst($__category) }} percentage outgoings"
                         style="width: {{ $__summary['percentage'] }}%"
                         aria-valuenow="{{ $__summary['percentage'] }}"
                         aria-valuemin="0"
                         aria-valuemax="{{ $__summary['percentage'] }}"
                         title="{{ ucfirst($__category) }} {{ $__summary['percentage'] }}% ">
                        @if ($__summary['percentage'] > 15) {{ $__summary['percentage'] }}% @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
    </div>

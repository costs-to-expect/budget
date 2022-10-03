@switch($category)
    @case ('flexible')
        <span class="badge text-bg-flexible">Flexible</span>
    @break

    @case ('income')
        <span class="badge text-bg-income">Income</span>
    @break

    @case ('savings')
        <span class="badge text-bg-savings text-white">Savings</span>
    @break

    @default
        <span class="badge text-bg-fixed">Fixed</span>
    @break
@endswitch
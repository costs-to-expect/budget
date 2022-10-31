@switch($category)
    @case ('flexible')
        <span class="badge text-bg-flexible" title="Flexible">Flexible</span>
    @break

    @case ('income')
        <span class="badge text-bg-income" title="Income">Income</span>
    @break

    @case ('savings')
        <span class="badge text-bg-savings text-white" title="Savings">Savings</span>
    @break

    @default
        <span class="badge text-bg-fixed" title="Fixed">Fixed</span>
    @break
@endswitch
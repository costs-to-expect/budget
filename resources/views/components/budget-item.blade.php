<div class="col-12">
    <div class="label">Name</div>
    {{ $item['name'] }}
</div>
<div class="col-6">
    <div class="label">Account</div>
    @if (array_key_exists($item['account'], $accounts))
        {{ $accounts[$item['account']]->name() }}
    @else
        Unknown Account (Please edit to fix)
    @endif
</div>
@if ($item['target_account'] !== null)
    <div class="col-6">
        <div class="label">Target Account</div>
        @if (array_key_exists($item['target_account'], $accounts))
            {{ $accounts[$item['target_account']]->name() }}
        @else
            Unknown Account (Please edit to fix)
        @endif
    </div>
@endif
<div class="col-12">
    <div class="label">Description</div>
    {{ $item['description'] ?? 'None set' }}
</div>
<div class="col-6">
    @if ($item['frequency']['type'] !== 'one-off')
    <div class="label">Start Date</div>
    @else
    <div class="label">Due Date</div>
    @endif
    {{ $item['start_date']->format('d/m/Y') }}
</div>
@if ($item['frequency']['type'] !== 'one-off')
<div class="col-6">
    <div class="label">End Date</div>
    {{ ($item['end_date'] !== null) ? $item['end_date']->format('d/m/Y') : 'None set' }}
</div>
@endif
<div class="col-12">
    <div class="label">Amount & Type</div>
    <small><x-currency :currency="$item['currency']" /></small>
    @if ($adjusted_amount === null)
    {{ number_format($item['amount'], 2) }}
    @else
    {{ number_format($adjusted_amount, 2) }}
    <del>
    <small><x-currency :currency="$item['currency']" /></small>
    {{ number_format($item['amount'], 2) }}
    </del>
    @endif
    <span class="ps-2"><x-category :category="$item['category']" /></span>
</div>
<div class="col-12">
    <a class="btn btn-sm btn-outline-primary" href="{{ route('budget.item.view', ['item_id' => $item['id'], 'action' => 'adjust', 'item-month' => $item_month, 'item-year' => $item_year]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
        </svg>
        Adjust Amount
    </a>
</div>

@if ($item['frequency']['type'] === 'monthly')
    <div class="col-12">
        <div class="label">Frequency</div>
        Monthly @if ($item['frequency']['day'] !== null) around the <x-ordinal :day="$item['frequency']['day']" /> of the month. @endif
    </div>
@endif

@if ($item['frequency']['type'] === 'annually')
    <div class="col-12">
        <div class="label">Frequency</div>
        Annually @if ($item['frequency']['day'] !== null) around the <x-ordinal :day="$item['frequency']['day']" /> of <x-month :month="$item['frequency']['month']" /> @else in <x-month :month="$item['frequency']['month']" /> @endif
    </div>
@endif

@if ($item['frequency']['type'] === 'one-off')
    <div class="col-12">
        <div class="label">Frequency</div>
        One-Off, due on {{ $item['start_date']->format('d/m/Y') }}
    </div>
@endif

@if (
    $item['frequency']['type'] === 'monthly' &&
    array_key_exists('exclusions', $item)
)
    <div class="col-12">
        <div class="label">Exclusions</div>
        Not required: {{ $item['exclusions'] }}
    </div>
@endif
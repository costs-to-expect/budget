<div class="col-12">
    <h2 class="display-6 mt-3 mb-3">
        Budget Item
    </h2>
</div>
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
    <div class="label">Start Date</div>
    {{ $item['start_date']->format('d/m/Y') }}
</div>
<div class="col-6">
    <div class="label">End Date</div>
    {{ ($item['end_date'] !== null) ? $item['end_date']->format('d/m/Y') : 'None set' }}
</div>
<div class="col-12">
    <div class="label">Amount & Type</div>
    <small><x-currency :currency="$item['currency']" /></small>{{ number_format($item['amount'], 2) }} <x-category :category="$item['category']" />
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

@if (
    $item['frequency']['type'] === 'monthly' &&
    array_key_exists('exclusions', $item)
)
    <div class="col-12">
        <div class="label">Exclusions</div>
        Not required: {{ $item['exclusions'] }}
    </div>
@endif
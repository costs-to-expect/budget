                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td><x-currency :currency="$item['currency']" />{{ number_format($item['amount'], 2) }}</td>
                                <td><x-category :category="$item['category']" /></td>
                                <td>
                                    @if ($item['frequency']['type'] === 'monthly')
                                        <div class="col-12">
                                            Monthly @if ($item['frequency']['day'] !== null) around the <x-ordinal :day="$item['frequency']['day']" /> of the month. @endif
                                        </div>
                                    @endif

                                    @if ($item['frequency']['type'] === 'annually')
                                        <div class="col-12">
                                            Annually @if ($item['frequency']['day'] !== null) around the <x-ordinal :day="$item['frequency']['day']" /> of <x-month :month="$item['frequency']['month']" /> @else in <x-month :month="$item['frequency']['month']" /> @endif
                                        </div>
                                    @endif

                                    @if ($item['frequency']['type'] === 'one-off')
                                        <div class="col-12">
                                            One-Off, due on {{ $item['start_date']->format('d/m/Y') }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item['frequency']['type'] === 'monthly' && array_key_exists('exclusions', $item))
                                        {{ $item['exclusions'] }}
                                    @else
                                        None
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item['status'] }}</strong>
                                </td>
                                <td>
                                    @if ($item['status'] === 'Disabled')
                                        <form action="{{ route('budget.item.confirm-enable.process', ['item_id' => $item['id'], 'return'=>'list']) }}" method="POST" class="text-end">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-dark">Enable</button>
                                        </form>
                                    @elseif ($item['status'] === 'Deleted/Expired')
                                        <form action="{{ route('budget.item.restore.process', ['item_id' => $item['id']]) }}" method="POST" class="text-end">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-dark">Restore</button>
                                        </form>
                                    @else
                                        <form action="{{ route('budget.item.confirm-disable.process', ['item_id' => $item['id'], 'return'=>'list']) }}" method="POST" class="text-end">
                                            @csrf
                                            <a href="{{ route('budget.item.view', [
                                                        'item_id' => $item['id'],
                                                        'item-year' => $item['uri']['item-year'],
                                                        'item-month' => $item['uri']['item-month'],
                                                        'month'=>  $item['uri']['month'],
                                                        'year'=> $item['uri']['year']]
                                                        ) }}"
                                               class="btn btn-sm btn-outline-primary mb-1">View on Budget</a><br />
                                            <button type="submit" class="btn btn-sm btn-dark">Disable</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            <tr class="pb-3 mb-3 border-bottom">
                                <td colspan="7">
                                    <table class="table table-sm table-borderless mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Account</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $item['start_date']->format('d/m/Y') }}</td>
                                            <td>
                                                @if ($item['end_date'] !== null)
                                                    {{ $item['end_date']->format('d/m/Y') }}
                                                @else
                                                    None set
                                                @endif
                                            </td>
                                            <td>{{ $account->name() }}</td>
                                            <td title="{{ $item['description'] }}">
                                                @if ($item['description'] !== null)
                                                    {{ Str::limit($item['description'], 35) }}
                                                @else
                                                    None set
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
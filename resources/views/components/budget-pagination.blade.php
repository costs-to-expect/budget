    <div id="pagination" class="pagination justify-content-between mt-4">
        <div>
            @if ($pagination['previous'] === null)
                <a class="btn btn-sm btn-outline-primary px-1 py-0 disabled" href="" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Previous
                </a>
            @else
                <a class="btn btn-sm btn-outline-primary px-1 py-0"
                   href="{{ route(
                        $pagination['selected']['item'] === null ? 'home' : 'budget.item.view' ,
                        [
                            'item_id' => $pagination['selected']['item'],
                            'item-year' => $pagination['selected']['year'],
                            'item-month' => $pagination['selected']['month'],
                            ...$pagination['previous'],
                            '#pagination'
                        ]
                    ) }}" title="Go back one month">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Previous
                </a>
                <a class="btn btn-sm btn-outline-primary px-1 py-0"
                   href="{{ route(
                        $pagination['selected']['item'] === null ? 'home' : 'budget.item.view' ,
                        [
                            'item_id' => $pagination['selected']['item'],
                            'item-year' => $pagination['selected']['year'],
                            'item-month' => $pagination['selected']['month'],
                            '#pagination'
                        ]
                    ) }}" title="Go to today">
                    Go to Today
                </a>
            @endif
        </div>

        <a class="btn btn-sm btn-outline-primary px-1 py-0"
           href="{{ route(
                        $pagination['selected']['item'] === null ? 'home' : 'budget.item.view' ,
                        [
                            'item_id' => $pagination['selected']['item'],
                            'item-year' => $pagination['selected']['year'],
                            'item-month' => $pagination['selected']['month'],
                            ...$pagination['next'],
                            '#pagination'
                        ]
                    ) }}" title="Go forward one month">
            Next
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </a>
    </div>
@if (count($requests) > 0)
<div class="row">
    <div class="col-12 pt-3">
        <h2 class="display-6 mt-3">API Requests</h2>

        <p class="lead">This App relies on the <a href="https://api.costs-to-expect.com">Costs to Expect API</a>.
            The API is Open Source, in keeping with that, we show all the requests we make against the API below.</p>
        <p>The table below details all the GET and OPTIONS requests that were made to the API during the page load.
            The responses from those requests are what we used to generate the content for this page.</p>
        <p>Your <abbr title="Access token for the API">Bearer</abbr> token was included with each
            of the requests; the response from each request is personal to you.</p>
    </div>

    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">Data</th>
                        <th scope="col">Method</th>
                        <th scope="col">Async?</th>
                        <th scope="col">Time</th>
                        <th scope="col">URI</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($requests as $__request)
                    <tr>
                        <td>{{ $__request['name'] }}</td>
                        <td>GET</td>
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </td>
                        <td>{{ $__request['time'] }}ms</td>
                        <td title="{{ $__request['uri'] }}"><a href="{{ $__request['uri'] }}">{{ Str::limit($__request['uri'], 45) }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

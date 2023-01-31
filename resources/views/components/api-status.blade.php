    @env(['staging', 'local'])
        @if (array_key_exists('environment', $api_status) && array_key_exists('cache', $api_status))
            <div class="container-fluid d-flex justify-content-end bg-dark">
                <div class="d-flex align-items-center">
                    <span class="badge bg-success me-2">API Environment: {{ $api_status['environment'] }}</span>
                    <span class="badge bg-success">API Cache: @if($api_status['cache'] === true) Enabled @else Disabled @endif</span>
                </div>
            </div>
            <div class=""></div>
        @endif
    @endenv
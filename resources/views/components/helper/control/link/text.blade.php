<a @if($lockable === true && $locked !== null) href="#" @else href="{{ $route }}" @endif class="text-pinky-500 underline font-medium hover:text-pinky-900">{{ $label }}</a>

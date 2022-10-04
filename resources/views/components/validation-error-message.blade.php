@if($has_error === true)
<div class="invalid-feedback">
    @if (count($errors) === 1)
        {{ $errors[0] }}
    @else
        <ul class="list-unstyled">
        @foreach ($errors as $__error)
            <li>{{ $__error }}</li>
        @endforeach
        </ul>
    @endif
</div>
@endif

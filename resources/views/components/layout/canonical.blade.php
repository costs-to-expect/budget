@props(['path' => null])
@php
    $canonicalPath = $path ?? request()->path();
    $canonicalPath = ($canonicalPath === '' || $canonicalPath === '/') ? '' : '/' . ltrim($canonicalPath, '/');
@endphp
<link rel="canonical" href="https://budget.costs-to-expect.com{{ $canonicalPath }}">

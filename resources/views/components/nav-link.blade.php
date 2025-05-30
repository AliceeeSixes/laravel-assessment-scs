@props(["href"])

@php
$active = "/" . request()->path() == $href;


$classes = ($active ?? false)
            ? 'px-3 py-1 rounded-lg hover:bg-black/10 transition-bg duration-300 bg-black/10 underline'
            : 'px-3 py-1 rounded-lg hover:bg-black/10 transition-bg duration-300';
@endphp




<a href="{{ $href }}" class="{{ $classes }}">{{ $slot }}</a>
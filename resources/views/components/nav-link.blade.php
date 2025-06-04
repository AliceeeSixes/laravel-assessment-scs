@props(["href"])

@php
$active = "/" . request()->path() == $href;


$classes = ($active ?? false)
            ? 'px-3 py-1 rounded-lg hover:bg-sky-600 dark:hover:bg-fuchsia-800 transition-bg duration-300 bg-sky-600 dark:bg-fuchsia-700 underline'
            : 'px-3 py-1 rounded-lg hover:bg-sky-600 dark:hover:bg-fuchsia-800 transition-bg duration-300';
@endphp




<a href="{{ $href }}" class="{{ $classes }}">{{ $slot }}</a>
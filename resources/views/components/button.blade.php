@props(["colour"=>"grey", "type"=>""])

@if (! $type || $type == "a")
    @php
        $tag = "a";
    @endphp
@else
    @php
        $tag = "button";
    @endphp
@endif


@php
    $classes = "font-bold rounded-full px-3 py-1 cursor-pointer text-white border brder-3 border-transparent hover:border-black dark:hover:border-white transition-border duration-300";
@endphp

@if ($colour == "blue")
    @php
        $classes .= " bg-sky-500 dark:bg-fuchsia-800";
    @endphp
@elseif ($colour == "red")
    @php
        $classes .= " bg-red-600 dark:bg-red-800";
    @endphp
@elseif ($colour == "green")
    @php
        $classes .= " bg-green-500 dark:bg-green-700";
    @endphp
@else
    @php
        $classes .= " bg-black/30 hover:bg-black/50";
    @endphp
@endif


<{{ $tag }} {{ $attributes->merge(["class"=>$classes]) }}>
    {{ $slot }}
</{{ $tag }}>
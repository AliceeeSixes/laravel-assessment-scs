@props(["colour"=>"grey", "type"=>""])

@if (! $type)
    @php
        $tag = "a";
    @endphp
@else
    @php
        $tag = "button";
    @endphp
@endif


@php
    $classes = "rounded-lg px-3 py-1  text-white";
@endphp

@if ($colour == "blue")
    @php
        $classes .= " bg-blue-400 hover:bg-blue-600";
    @endphp
@elseif ($colour == "red")
    @php
        $classes .= " bg-red-500 hover:bg-red-700";
    @endphp
@elseif ($colour == "green")
    @php
        $classes .= " bg-green-500 hover:bg-green-600";
    @endphp
@else
    @php
        $classes .= " bg-black/30 hover:bg-black/50";
    @endphp
@endif


<{{ $tag }} {{ $attributes->merge(["class"=>$classes]) }}>
    {{ $slot }}
</{{ $tag }}>
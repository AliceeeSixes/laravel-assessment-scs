@props(["type"=>"p"])
<{{ $type }} {{ $attributes->merge(["class"=>"truncate truncate-ellipsis"]) }}>{{ $slot }}</{{ $type }}>
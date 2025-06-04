@props(["href"=>""])

@if ($href)
    <a {{ $attributes->merge(["class"=>"truncate truncate-ellipsis border border-transparent hover:border-black dark:hover:border-white transition-border duration-300"]) }} href="{{ $href }}">
        {{ $slot }}
    </a>
@else
    <div {{ $attributes->merge(["class"=>"truncate truncate-ellipsis"]) }}>
        {{ $slot }}
    </div>
@endif


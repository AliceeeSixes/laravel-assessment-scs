@props(["href"=>""])

@if ($href)
    <a {{ $attributes->merge(["class"=>"border border-black dark:border-white rounded-lg truncate truncate-ellipsis"]) }} href="{{ $href }}">
        {{ $slot }}
    </a>
@else
    <div {{ $attributes->merge(["class"=>"border border-black dark:border-white rounded-lg truncate truncate-ellipsis"]) }}>
        {{ $slot }}
    </div>
@endif


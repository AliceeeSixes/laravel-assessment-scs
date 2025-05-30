<x-layout>
    <x-page-title>{{ $company->name }}</x-page-title>

    <x-panel class="m-auto sm:w-md lg:w-xl px-5 pb-5 pt-3 text-lg">
        <div class="flex justify-between mb-5 truncate truncate-ellipsis">
            <div class="truncate truncate-ellipsis">
                <p class="truncate truncate-ellipsis">Name: {{ $company->name }}</p>
                <p class="truncate truncate-ellipsis">Website: {{ $company->website }}</p>
                <p class="truncate truncate-ellipsis">Email: {{ $company->email }}</p>
            </div>
            @if ($company->logo)
                <img src="/storage/{{ $company->logo }}" class="max-w-20 max-h-20"/>
            @else
                <img src="https://placehold.co/100" class="w-20"/>
            @endif
        </div>

        <div class="text-center">
            <x-button colour="blue" href="/companies/edit/{{ $company->id }}" class="px-3 py-1 rounded-lg transition-bg duration-300">Edit Details</x-button>
        </div>
    </x-panel>
</x-layout>
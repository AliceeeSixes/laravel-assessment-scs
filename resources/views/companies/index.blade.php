<x-layout>
    <x-page-title>Companies</x-page-title>
    <div class="text-center mb-20">
        <x-button href="/companies/create" colour="blue" class="px-5 py-2 text-2xl transition-bg duration-300">Create New Company</x-button>
    </div>


    <section class="pb-10 m-auto max-w-300">

        <x-search action="/companies/search"></x-search>

        <div class="bg-gray-200 dark:bg-slate-950 rounded-xl px-10 py-5">
            <div class="mb-5">
                {{ $companies->links("components.pagination") }}
            </div>
            <div class="grid gap-5 py-2">
                @foreach ($companies as $company)
                    <x-panel href="/companies/{{ $company->id }}" class="p-5 bg-white dark:bg-slate-900">
                        <div class="flex justify-between">
                            <div class="truncate truncate-ellipsis">
                                <p class="text-xl font-bold truncate truncate-ellipsis max-w-xl">{{ $company->name }}</p>
                                <p class="truncate truncate-ellipsis">Email: {{ $company->email }}</p>
                                <p class="truncate truncate-ellipsis">Website: {{ $company->website }}</p>
                                <p class="truncate truncate-ellipsis">Employees: {{ $company->employees->count() }}
                            </div>
                            <div>
                                @if ($company->logo)
                                    <img src="/storage/{{ $company->logo }}" class="w-20 h-20"/>
                                @else
                                    <img src="https://placehold.co/100" class="w-20"/>
                                @endif
                            </div>
                        </div>
                    </x-panel>
                @endforeach
            </div>

            <div class="mt-5">
                {{ $companies->links("components.pagination") }}
            </div>
        </div>
    </section>
</x-layout>
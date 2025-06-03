<x-layout>
    <x-page-title>Companies</x-page-title>
    <div class="text-center mb-10">
        <x-button href="/companies/create" colour="blue" class="px-5 py-2 rounded-lg text-2xl transition-bg duration-300">Create New Company</x-button>
    </div>


    <section class="pb-10 m-auto max-w-300">

        <form id="search" action="/companies/search" method="get" class="flex justify-center mb-10">
            @php
                if (isset($_GET["q"])) {
                    $query = htmlspecialchars($_GET["q"]);
                } else {
                    $query = "";
                }
            @endphp
            <input name="q" class="border border-gray-400 rounded-l-xl px-3 py-1 font-xl w-md" value="{{ $query }}"/>
            <x-button class="rounded-r-xl rounded-l-none" colour="blue" type="submit"><i class="fa fa-search px-1"></i></x-button>
        </form>

        <div class="border border-gray-400 dark:border-white bg-gray-200 dark:bg-slate-950 rounded-lg px-10 py-5">
            <div class="mb-5">
                {{ $companies->links("components.pagination") }}
            </div>
            <div class="grid gap-5 my-2">
                @foreach ($companies as $company)
                    <x-panel href="/companies/{{ $company->id }}" class="p-5 bg-white dark:bg-slate-900">
                        <div class="flex justify-between">
                            <div class="truncate truncate-ellipsis">
                                <p class="text-lg font-bold truncate truncate-ellipsis">{{ $company->name }}</p>
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
                {{ $companies->links() }}
            </div>
        </div>
    </section>
</x-layout>
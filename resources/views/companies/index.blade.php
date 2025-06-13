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
                        <div class="flex justify-between gap-5">
                            <div class="truncate truncate-ellipsis flex-1 flex flex-col justify-between lg:flex-row lg:items-center">
                                <p class="text-xl xl:text-2xl font-bold truncate truncate-ellipsis max-w-xl lg:w-50 lg:text-lg">{{ $company->name }}</p>
                                <p class="truncate truncate-ellipsis min-w-4xs lg:w-10"><i class="fa fa-user"></i> {{ $company->employees->count() }}
                                <!-- Action Buttons - Mobile View -->
                                <x-company-actions :company="$company" class="flex sm:hidden w-fit gap-2 text-sm"/>
                                <p class="truncate truncate-ellipsis hidden sm:block lg:w-50"><i class="fa fa-envelope"></i> {{ $company->email }}</p>
                                <p class="truncate truncate-ellipsis hidden sm:block lg:w-50"><i class="fa fa-globe"></i> {{ $company->website }}</p>

                                
                            </div>
                            <!-- Action Buttons - Desktop View -->
                            <x-company-actions :company="$company" class="self-center hidden sm:flex gap-2 flex-col lg:text-xs"/>
                            <div class="flex">
                                @if ($company->logo)
                                    <img src="/storage/{{ $company->logo }}" class="w-20 h-20 sm:w-30 sm:h-30 lg:h-20 lg:w-20"/>
                                @else
                                    <img src="https://placehold.co/100" class="w-20 sm:w-30 lg:w-20"/>
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
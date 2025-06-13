<x-layout>
    <x-page-title>Employees</x-page-title>
    <div class="text-center mb-20">
        <x-button colour="blue" href="/employees/create" class="px-5 py-2 text-2xl transition-bg duration-300">Create New Employee</x-button>
    </div>


    <section class="max-w-300 m-auto">

        <x-search action="/employees/search"></x-search>

        <div class="bg-gray-200 dark:bg-slate-950 px-10 py-5 rounded-xl">

            <div class="mb-5">
                {{ $employees->links("components.pagination") }}
            </div>

            <div class="grid gap-5 py-2">
                @foreach ($employees as $employee)
                    <x-panel href="/employees/{{ $employee->id }}" class="p-5 bg-white dark:bg-slate-900 flex flex-col lg:flex-row lg:gap-1 lg:justify-between truncate truncate-ellipsis">
                        <x-card-detail class="text-xl font-bold lg:w-50 lg:text-base">{{ $employee->last_name . ", " . $employee->first_name}}</x-card-detail>
                        <x-card-detail type="span" class="lg:w-40 block">
                            <span class="lg:hidden">Works at </span>
                            <form action="/companies/{{ $employee->company->id }}" method="POST" class="w-fit inline">
                                @csrf
                                <button type="submit" class="inline cursor-pointer underline hover:text-blue-400 lg:w-40 overflow-hidden truncate truncate-ellipsis text-left">
                                    {{ $employee->company->name }}
                                </button>
                            </form>
                            @if ($employee->job_title)
                                as {{ $employee->job_title }}
                            @endif
                        </x-card-detail>
                        <x-card-detail class="lg:w-40"><i class="fa fa-envelope"></i> {{ $employee->email }}</x-card-detail>
                        <x-card-detail class="lg:w-40"><i class="fa fa-phone"></i> {{ $employee->phone }}</x-card-detail>
                    </x-panel>
                @endforeach

            </div>

            <div class="mt-5">
                {{ $employees->links("components.pagination") }}
            </div>
        </div>
    </section>
</x-layout>
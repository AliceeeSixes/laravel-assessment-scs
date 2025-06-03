<x-layout>
    <x-page-title>Employees</x-page-title>
    <div class="text-center mb-10">
        <x-button colour="blue" href="/employees/create" class="px-5 py-2 rounded-lg text-2xl transition-bg duration-300">Create New Employee</x-button>
    </div>


    <section class="max-w-300 m-auto ">

        <form id="search" action="/employees/search" method="get" class="flex justify-center mb-10">
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

        <div class="border border-gray-400 dark:border-white bg-gray-200 dark:bg-slate-950 px-10 py-5 rounded-lg">

            <div class="mb-5">
                {{ $employees->links("components.pagination") }}
            </div>

            <div class="grid gap-5 py-2">
                @foreach ($employees as $employee)
                    <x-panel href="/employees/{{ $employee->id }}" class="p-5 bg-white dark:bg-slate-900">
                        <x-card-detail class="text-lg font-bold">{{ $employee->last_name . ", " . $employee->first_name}}</x-card-detail>
                        <x-card-detail type="span">Works at 
                            <form action="/companies/{{ $employee->company->id }}" method="POST" class="w-fit inline">
                                @csrf
                                <button type="submit" class="inline cursor-pointer underline hover:text-blue-400">{{ $employee->company->name }}</button>
                            </form>
                            @if ($employee->job_title)
                                as {{ $employee->job_title }}
                            @endif
                        </x-card-detail>
                        <x-card-detail>Email: {{ $employee->email }}</x-card-detail>
                        <x-card-detail>Phone: {{ $employee->phone }}</x-card-detail>
                    </x-panel>
                @endforeach

            </div>

            <div class="mt-5">
                {{ $employees->links() }}
            </div>
        </div>
    </section>
</x-layout>
<x-layout>
    <x-page-title>{{ $company->name }}</x-page-title>

    <div class="px-10 py-5 border border-gray-400 rounded-lg bg-gray-200 dark:bg-slate-950 max-w-4xl m-auto gap-3 flex flex-col">

        <!-- Company Details Section -->
        <h3 class="text-xl">Company Details</h3>
        <x-panel class="px-5 pb-5 pt-3 text-lg bg-white dark:bg-slate-900 mb-20">
            <div class="flex justify-between mb-5 truncate truncate-ellipsis">
                <div class="truncate truncate-ellipsis">
                    <x-card-detail class="font-bold">{{ $company->name }}</x-card-detail>
                    <x-card-detail>Website: <a href="{{ $company->website }}" class="hover:underline">{{ $company->website }}</a></x-card-detail>
                    <x-card-detail>Email: {{ $company->email }}</x-card-detail>
                    <x-card-detail>Employees: {{ $company->employees->count() }}</x-card-detail>
                </div>
                @if ($company->logo)
                    <img src="/storage/{{ $company->logo }}" class="w-20 h-20"/>
                @else
                    <img src="https://placehold.co/100" class="w-20"/>
                @endif
            </div>

            <div class="text-center flex justify-center gap-5">
                <x-button colour="blue" href="/companies/edit/{{ $company->id }}" class="px-3 py-1 rounded-lg transition-bg duration-300">Edit Details</x-button>
                <form action="/companies/delete/{{ $company->id }}" method="POST" onsubmit="return confirm('Are you sure you want to do this?');">
                    @csrf
                    <x-button colour="red" type="submit" class="px-3 py-1 rounded-lg transition-bg duration-300">Delete</x-button>
                </form>
            </div>
        </x-panel>


        <!-- Employees Section -->
        <div class="flex justify-between">
            <h3 class="text-xl">Employees</h3>
            <x-button colour="green" class="text-lg" href="/employees/create?company={{ $company->id }}">Add Employee</x-button>
        </div>
        <div class="grid gap-5">
            @foreach ($employees as $employee)
                <x-panel href="/employees/{{ $employee->id }}" class="p-5 bg-white">
                    <x-card-detail class="text-lg font-bold">{{ $employee->last_name . ", " . $employee->first_name}}</x-card-detail>
                    <x-card-detail type="span">Works at 
                        <form action="/companies/{{ $company->id }}" method="POST" class="w-fit inline">
                            @csrf
                            <button type="submit" class="inline cursor-pointer underline hover:text-blue-400">{{ $company->name }}</button>
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

    </div>
</x-layout>
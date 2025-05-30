<x-layout>
    <x-page-title>{{ $company->name }}</x-page-title>

    <div class="px-10 py-5 border border-gray-400 rounded-lg bg-gray-200 max-w-4xl m-auto gap-3 flex flex-col">

        <!-- Company Details Section -->
        <h3 class="text-xl">Company Details</h3>
        <x-panel class="px-5 pb-5 pt-3 text-lg bg-white mb-20">
            <div class="flex justify-between mb-5 truncate truncate-ellipsis">
                <div class="truncate truncate-ellipsis">
                    <p class="truncate truncate-ellipsis font-bold">{{ $company->name }}</p>
                    <p class="truncate truncate-ellipsis">Website: {{ $company->website }}</p>
                    <p class="truncate truncate-ellipsis">Email: {{ $company->email }}</p>
                    <p class="truncate truncate-ellipsis">Employees: {{ $company->employees->count() }}
                </div>
                @if ($company->logo)
                    <img src="/storage/{{ $company->logo }}" class="w-20 h-20"/>
                @else
                    <img src="https://placehold.co/100" class="w-20"/>
                @endif
            </div>

            <div class="text-center flex justify-center gap-5">
                <x-button colour="blue" href="/companies/edit/{{ $company->id }}" class="px-3 py-1 rounded-lg transition-bg duration-300">Edit Details</x-button>
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
                    <p class="text-lg font-bold truncate truncate-ellipsis">{{ $employee->last_name . ", " . $employee->first_name}}</p>
                    <span class="truncate truncate-ellipsis">Works at 
                        <form action="/companies/{{ $company->id }}" method="POST" class="w-fit inline">
                            @csrf
                            <button type="submit" class="inline cursor-pointer underline hover:text-blue-400">{{ $company->name }}</button>
                        </form>
                        @if ($employee->job_title)
                            as {{ $employee->job_title }}
                        @endif
                    </span>
                    <p class="truncate truncate-ellipsis">Email: {{ $employee->email }}</p>
                    <p class="truncate truncate-ellipsis">Phone: {{ $employee->phone }}</p>
                </x-panel>
            @endforeach

        </div>

    </div>
</x-layout>
<x-layout>
    <x-page-title>Employees</x-page-title>
    <div class="text-center mb-10">
        <x-button colour="blue" href="/employees/create" class="px-5 py-2 rounded-lg text-2xl transition-bg duration-300">Create New Employee</x-button>
    </div>


    <section class="max-w-300 m-auto ">

        <div class="border border-gray-400 bg-gray-200 px-10 py-5 rounded-lg">

            <div>
                {{ $employees->links() }}
            </div>

            <div class="grid gap-5 py-2">
                @foreach ($employees as $employee)
                    <x-panel href="/employees/{{ $employee->id }}" class="p-5 bg-white">
                        <p class="text-lg font-bold truncate truncate-ellipsis">{{ $employee->last_name . ", " . $employee->first_name}}</p>
                        <span class="truncate truncate-ellipsis">Works at 
                            <form action="/companies/{{ $employee->company->id }}" method="POST" class="w-fit inline">
                                @csrf
                                <button type="submit" class="inline cursor-pointer underline hover:text-blue-400">{{ $employee->company->name }}</button>
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

            <div>
                {{ $employees->links() }}
            </div>
        </div>
    </section>
</x-layout>
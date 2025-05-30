<x-layout>
    <x-page-title>Employees</x-page-title>
    <div class="text-center mb-10">
        <x-button colour="blue" href="/employees/create" class="px-5 py-2 rounded-lg text-2xl transition-bg duration-300">Create New Employee</x-button>
    </div>


    <section>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($employees as $employee)
                <x-panel href="/employees/{{ $employee->id }}" class="p-5">
                    {{ $employee->last_name . ", " . $employee->first_name}}
                </x-panel>
            @endforeach

        </div>

    </section>
</x-layout>
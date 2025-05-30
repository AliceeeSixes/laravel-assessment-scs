<x-layout>
    <x-page-title>{{ $employee->last_name . ", " . $employee->first_name }}</x-page-title>

    <x-panel class="m-auto sm:w-md lg:w-xl pb-5 pt-3 text-lg">
        <div class="flex justify-between mb-5">
            <div>
                <p>Name: {{ $employee->last_name . ", " . $employee->first_name }}</p>
                <p>Email: {{ $employee->email }}</p>
                <p>Phone: {{ $employee->phone }}</p>
                <p>Company: {{ $employee->company->name }}</p>
            </div>
        </div>

        <div class="text-center">
            <a href="/employees/edit/{{ $employee->id }}" class="px-3 py-1 border border-black/30 rounded-lg hover:bg-black/20 transition-bg duration-300">Edit Details</a>
        </div>
    </x-panel>
</x-layout>
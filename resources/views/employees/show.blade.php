<x-layout>
    <x-page-title>{{ $employee->last_name . ", " . $employee->first_name }}</x-page-title>

    <div class="px-10 py-5 bg-gray-200 border border-gray-400 rounded-lg max-w-4xl m-auto flex flex-col gap-3">
        <h3 class="text-xl">Employee Details</h3>
        <x-panel class="px-5 pb-5 pt-3 text-lg bg-white">
            <div class="flex justify-between mb-5 truncate truncate-ellipsis">
                <div class="truncate truncate-ellipsis">
                    <p class="truncate truncate-ellipsis">Name: {{ $employee->last_name . ", " . $employee->first_name }}</p>
                    <p class="truncate truncate-ellipsis">Email: {{ $employee->email }}</p>
                    <p class="truncate truncate-ellipsis">Phone: {{ $employee->phone }}</p>
                    <span class="truncate truncate-ellipsis">Company:
                        <form action="/companies/{{ $employee->company->id }}" method="POST" class="w-fit inline">
                            @csrf
                            <button type="submit" class="inline cursor-pointer underline hover:text-blue-400">{{ $employee->company->name }}</button>
                        </form>
                    </span>
                    <p class="truncate truncate-ellipsis">Role: {{ $employee->job_title }}</p>
                </div>
            </div>

            <div class="text-center flex justify-center gap-5">
                <x-button colour="blue" href="/employees/edit/{{ $employee->id }}" class="px-3 py-1">Edit Details</x-button>
            </div>
        </x-panel>
    </div>
</x-layout>
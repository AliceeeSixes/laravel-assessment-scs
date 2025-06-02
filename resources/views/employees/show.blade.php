<x-layout>
    <x-page-title>{{ $employee->last_name . ", " . $employee->first_name }}</x-page-title>

    <div class="px-10 py-5 bg-gray-200 dark:bg-slate-950 border border-gray-400 dark:border-white rounded-lg max-w-4xl m-auto flex flex-col gap-3">
        <h3 class="text-xl">Employee Details</h3>
        <x-panel class="px-5 pb-5 pt-3 text-lg bg-white dark:bg-slate-900">
            <div class="flex justify-between mb-5 truncate truncate-ellipsis">
                <div class="truncate truncate-ellipsis">
                    <x-card-detail class="font-bold">{{ $employee->last_name . ", " . $employee->first_name }}</x-card-detail>
                    <x-card-detail>Email: {{ $employee->email }}</x-card-detail>
                    <x-card-detail>Phone: {{ $employee->phone }}</x-card-detail>
                    <x-card-detail type="span">Company:
                        <form action="/companies/{{ $employee->company->id }}" method="POST" class="w-fit inline">
                            @csrf
                            <button type="submit" class="inline cursor-pointer underline hover:text-blue-400">{{ $employee->company->name }}</button>
                        </form>
                    </x-card-detail>
                    <x-card-detail>Role: {{ $employee->job_title }}</x-card-detail>
                </div>
            </div>

            <div class="text-center flex justify-center gap-5">
                <x-button colour="blue" href="/employees/edit/{{ $employee->id }}" class="px-3 py-1">Edit Details</x-button>
                <form action="/employees/delete/{{ $employee->id }}" method="POST" onsubmit="return confirm('Are you sure you want to do this?');">
                    @csrf
                    <x-button colour="red" type="submit" class="px-3 py-1">Delete</x-button>
                </form>

            </div>
        </x-panel>
    </div>
</x-layout>
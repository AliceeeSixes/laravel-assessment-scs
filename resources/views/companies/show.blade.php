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
        @if ($employees->count() > 0)
            <div>
                <!-- Manual Pagination of Collection -->
                @php
                    if (isset($_GET["p"])) {
                        $currentPage = htmlspecialchars($_GET["p"]);
                    } else {
                        $currentPage = 1;
                    }

                    if ($currentPage == 1) {
                        $prevPage = 1;
                    } else {
                        $prevPage = $currentPage - 1;
                    }

                    if ($currentPage < ceil($employees->count() / 10)) {
                        $nextPage = $currentPage + 1;
                    } else {
                        $nextPage = $currentPage;
                    }

                @endphp
                <div class="flex justify-between">
                    <a href="?p={{ $prevPage }}"
                        rel="prev"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                        « Previous
                    </a>
                    <a href="?p={{ $nextPage }}"
                        rel="next"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                        Next »
                    </a>
                </div>

                <div class="grid gap-5 my-2">
                    @php
                        if (isset($_GET["p"])) {
                            $employees = $employees->forPage(htmlspecialchars($_GET["p"]), 10);
                        } else {
                            $employees = $employees->forPage(1, 10);
                        }
                    @endphp
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
                
                <div class="flex justify-between">
                    <a href="?p={{ $prevPage }}"
                        rel="prev"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                        « Previous
                    </a>
                    <a href="?p={{ $nextPage }}"
                        rel="next"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                        Next »
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
<x-layout>
    <x-page-title>Dashboard</x-page-title>


    <section class="pb-10 m-auto max-w-300 grid grid-cols-1 sm:grid-cols-2 justify-between gap-5 text-3xl">
        <div class="relative h-50 border border-black hover:border-gray-400 rounded-lg px-10 py-5 w-full text-center bg-gray-100 dark:bg-slate-950 transition-bg duration-300 flex items-center justify-center">
            <h2>Companies</h2>
            <div class="absolute w-full left-0 bottom-5 text-lg flex gap-5 justify-center">
                <x-button colour="blue" href="/companies"><i class="fa fa-list"></i></x-button>
                <x-button colour="green" href="/companies/create"><i class="fa fa-plus"></i></x-button>
            </div>
        </div>

        <div class="relative h-50 border border-black hover:border-gray-400 rounded-lg px-10 py-5 w-full text-center bg-gray-100 dark:bg-slate-950 transition-bg duration-300 flex items-center justify-center">
            <h2>Employees</h2>
            <div class="absolute w-full left-0 bottom-5 text-lg flex gap-5 justify-center">
                <x-button colour="blue" href="/employees"><i class="fa fa-list"></i></x-button>
                <x-button colour="green" href="/employees/create"><i class="fa fa-plus"></i></x-button>
            </div>
        </div>

        <div class="relative h-fit border border-black hover:border-gray-400 rounded-lg px-5 py-5 w-full text-center bg-gray-100 dark:bg-slate-950 transition-bg duration-300 flex flex-col gap-5 text-base">
            <h2 class="text-xl underline">Recent Companies</h2>
            <div class="flex flex-col gap-2">
                @foreach ($companies as $company)
                    <a href="/companies/{{ $company->id }}" class="border border-black rounded-xl bg-gray-200 hover:bg-gray-300 dark:bg-slate-800 dark:hover:bg-slate-900 transition-bg duration-300 w-full flex flex-col lg:flex-row justify-between px-5 py-1">
                        <span>{{ $company->name }}</span>
                        <span>Updated {{ $company->updated_at }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="relative h-fit border border-black hover:border-gray-400 rounded-lg px-5 py-5 w-full text-center bg-gray-100 dark:bg-slate-950 transition-bg duration-300 flex flex-col gap-5 text-base">
            <h2 class="text-xl underline">Recent Employees</h2>
            <div class="flex flex-col gap-2">
                @foreach ($employees as $employee)
                    <a href="/employees/{{ $employee->id }}" class="border border-black rounded-xl bg-gray-200 hover:bg-gray-300 dark:bg-slate-800 dark:hover:bg-slate-900 transition-bg duration-300 w-full flex flex-col lg:flex-row justify-between px-5 py-1">
                        <span>{{ $employee->first_name . " " . $employee->last_name }}</span>
                        <span>Updated {{ $employee->updated_at }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
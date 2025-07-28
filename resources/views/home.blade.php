<x-layout>
    <x-page-title>Dashboard</x-page-title>


    <section class="pb-10 m-auto max-w-300 flex flex-col sm:flex-row justify-between gap-5 text-3xl">
        <div class="relative h-50 border border-black hover:border-gray-400 rounded-lg p-10 w-full text-center bg-gray-100 dark:bg-slate-950 transition-bg duration-300 flex items-center justify-center">
            <h2>Companies</h2>
            <div class="absolute w-full left-0 bottom-5 text-lg flex gap-5 justify-center">
                <x-button colour="blue" href="/companies"><i class="fa fa-list"></i></x-button>
                <x-button colour="green" href="/companies/create"><i class="fa fa-plus"></i></x-button>
            </div>
        </div>

        <div class="relative h-50 border border-black hover:border-gray-400 rounded-lg p-10 w-full text-center bg-gray-100 dark:bg-slate-950 transition-bg duration-300 flex items-center justify-center">
            <h2>Employees</h2>
            <div class="absolute w-full left-0 bottom-5 text-lg flex gap-5 justify-center">
                <x-button colour="blue" href="/employees"><i class="fa fa-list"></i></x-button>
                <x-button colour="green" href="/employees/create"><i class="fa fa-plus"></i></x-button>
            </div>
        </div>
    </section>
</x-layout>
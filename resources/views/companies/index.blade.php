<x-layout>
    <x-page-title>Companies</x-page-title>
    <div class="text-center mb-10">
        <x-button href="/companies/create" colour="blue" class="px-5 py-2 rounded-lg text-2xl transition-bg duration-300">Create New Company</x-button>
    </div>


    <section>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($companies as $company)
                <x-panel href="/companies/{{ $company->id }}" class="p-5">
                    {{ $company->name }}
                </x-panel>
            @endforeach

        </div>

    </section>
</x-layout>
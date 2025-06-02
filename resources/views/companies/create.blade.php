<x-layout>
    <x-page-title>
        @if ($company)
            Edit Company
        @else
            Create Company
        @endif

    </x-page-title>

    <x-panel class="sm:w-md lg:w-xl m-auto">
        <form method="POST" action="" class="flex gap-5 flex-col p-5" enctype="multipart/form-data">
            @csrf
            @if ($company)
                @method("PATCH")
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h3 class="text-center text-xl">Company Details</h3>


            <x-form.input name="name" label="Name" :company=$company/>

            <x-form.input name="website" label="Website" :company=$company/>

            <x-form.input name="email" label="Email" :company=$company/>

            <div class="w-fit m-auto flex flex-col">
                <label>Logo</label>
                <input name="logo" type="file" class="border border-slate-600 dark:border-white rounded-xl px-3" />
            </div>

            <div class="flex gap-5 justify-center">
                <x-button href="/companies" colour="red" class="px-3 py-1 rounded-lg transition-bg duration-300">Cancel</x-button>
                <x-button colour="green" type="submit" class="px-3 py-1 rounded-lg  transition-bg duration-300 cursor-pointer">Submit</x-button>
            </div>

        </form>

    </x-panel>

</x-layout>
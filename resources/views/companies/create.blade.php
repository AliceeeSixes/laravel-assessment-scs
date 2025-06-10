<x-layout>
    <x-page-title>
        @if ($company)
            Edit Company
        @else
            @php
                $company = "";
            @endphp
            Create Company
        @endif

    </x-page-title>

    <x-panel class="sm:w-md lg:w-xl m-auto bg-gray-200 dark:bg-slate-950 rounded-xl">
        <form method="POST" action="" class="flex gap-5 flex-col p-5" enctype="multipart/form-data">
            @csrf
            {{-- Idempotency Token (skip duplicate requests) --}}
            @php
                $time = time();
                $rng = rand(0, 1000000);
                $requestToken = $time . "-" . $rng;
            @endphp
            <input type="hidden" name="request_token" value="{{ $requestToken }}"/>

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

            <h3 class="text-center text-2xl">Company Details</h3>


            <x-form.input name="name" placeholder='Alphabet Inc.' label="Name" :company=$company :required="true"/>

            <x-form.input name="website" placeholder="https://www.google.com" label="Website" :company=$company/>

            <x-form.input name="email" placeholder="email@site.com" label="Email" :company=$company/>

            <div class="w-fit m-auto flex flex-col">
                <label>Logo</label>
                <input name="logo" type="file" class="text-black bg-white w-2xs border border-transparent rounded-xl px-3" />
            </div>

            <div class="flex gap-5 justify-center">
                <x-button href="/companies" colour="red" class="px-3 py-1 rounded-lg transition-bg duration-300">Cancel</x-button>
                <x-button colour="green" type="submit" class="px-3 py-1 rounded-lg  transition-bg duration-300 cursor-pointer">Submit</x-button>
            </div>

        </form>

    </x-panel>

</x-layout>
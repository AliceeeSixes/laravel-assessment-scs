<x-layout>
    <x-page-title>Log In</x-page-title>
    <form method="POST" action="" class="flex flex-col text-center w-full sm:w-xl m-auto bg-gray-200 dark:bg-slate-950 rounded-xl p-5 text-xl gap-5">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex flex-col">
            <label>Email</label>
            <input name="email" class="text-black bg-white border border-transparent rounded-xl w-full sm:w-md m-auto px-3 py-1"/>
        </div>

        <div class="flex flex-col">
            <label>Password</label>
            <input name="password" type="password" class="text-black bg-white border border-transparent rounded-xl w-full sm:w-md m-auto px-3 py-1"/>
        </div>

        <div class="mt-2">
            <x-button colour="blue" type="submit">Log In</x-button>
        </div>

        <div class="w-fit m-auto text-base">
            <p class="underline">Test user credentials</p>
            <p>Email: admin@admin.com</p>
            <p>Password: password</p>
        </div>

    </form>
    
</x-layout>
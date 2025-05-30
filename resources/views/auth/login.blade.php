<x-layout>
    <x-page-title>Log In</x-page-title>
    <form method="POST" action="" class="flex flex-col text-center w-xl m-auto border border-gray-400 rounded-xl p-5 text-lg gap-5">
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
            <label>Username</label>
            <input name="email" class="border border-gray-400 rounded-lg w-md m-auto px-3 py-1"/>
        </div>

        <div class="flex flex-col">
            <label>Password</label>
            <input name="password" type="password" class="border border-gray-400 rounded-lg w-md m-auto px-3 py-1"/>
        </div>

        <div class="mt-5">
            <x-button colour="blue" type="submit">Log In</x-button>
        </div>
    </form>
    
</x-layout>
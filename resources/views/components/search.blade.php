@props(["action"=>"/"])
<form id="search" action="{{ $action }}" method="get" class="flex justify-center w-fit rounded-full m-auto mb-10 text-xl text-black border border-2 border-transparent focus-within:border-sky-500 dark:focus-within:border-fuchsia-800">
    @php
        if (isset($_GET["q"])) {
            $query = htmlspecialchars($_GET["q"]);
        } else {
            $query = "";
        }
    @endphp
    <input name="q" class="bg-gray-200 rounded-l-full px-3 py-1 font-xl w-2xs sm:w-md focus-within:outline-none" value="{{ $query }}"/>
    <x-button class="rounded-l-none" colour="blue" type="submit"><i class="fa fa-search px-1"></i></x-button>
</form>
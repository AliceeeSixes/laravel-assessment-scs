@props(["action"=>"/"])
<form id="search" action="{{ $action }}" method="get" class="flex justify-center mb-10 text-xl text-black">
    @php
        if (isset($_GET["q"])) {
            $query = htmlspecialchars($_GET["q"]);
        } else {
            $query = "";
        }
    @endphp
    <input name="q" class="bg-gray-200 rounded-l-full px-3 py-1 font-xl w-md" value="{{ $query }}"/>
    <x-button class="rounded-l-none" colour="blue" type="submit"><i class="fa fa-search px-1"></i></x-button>
</form>
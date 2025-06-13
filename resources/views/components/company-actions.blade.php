@props(["company"])
<div {{ $attributes->merge(["class"=>"items-center jutify-between"]) }}>
    <!-- Add Employee -->
    <form action="/employees/create" method="GET">
        <input type="hidden" name="company" value="{{$company->id}}" />
        <x-button colour="green" type="submit">
            <i class="fa fa-user-plus"></i>
        </x-button>
    </form>
    <!-- Edit Company -->
    <form action="/companies/edit/{{ $company->id }}" method="GET">
        <x-button colour="blue" type="submit">
            <i class="fa fa-pencil"></i>
        </x-button>
    </form>
    <!-- Delete Company -->
    <form action="/companies/delete/{{ $company->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{$company->name}}?');">
        @csrf
        <x-button colour="red" type="submit">
            <i class="fa fa-trash"></i>
        </x-button>
    </form>
</div>
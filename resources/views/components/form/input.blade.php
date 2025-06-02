@props(["name"=>"","label"=>"Input", "company", "employee"])

@if (isset($company))
    {{-- Company Inputs --}}
    <div class="w-fit m-auto flex flex-col">
        <label>{{ $label }}</label>
        <input name="{{ $name }}" class="border border-slate-600 dark:border-white rounded-xl px-3"
            @if ($company)
                value="{{ $company->$name }}"
            @elseif (! ($errors->first("{{ $name }}")))
                value="{{ old($name) }}"
            @endif
        />
    </div>
@else
    {{-- Employee Inputs --}}
    <div class="w-fit m-auto flex flex-col">
        <label>{{ $label }}</label>
        <input name="{{ $name }}" class="border border-slate-600 dark:border-white rounded-xl px-3" 
            @if ($employee)
                value="{{ $employee->$name }}"
            @elseif (! ($errors->first("{{ $name }}")))
                value="{{ old($name) }}"
            @endif
        />
    </div>
@endif



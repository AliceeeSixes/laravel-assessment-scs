@props(["name"=>"","label"=>"Input", "company", "employee", "required"=>""])


@if (isset($company))
    {{-- Company Inputs --}}
    <div class="w-fit m-auto flex flex-col">
        <label>{{ $label }}
                @if ($required)
                    <span class="text-red-300">*</span>
                @endif
        </label>
        <input name="{{ $name }}" class="border border-slate-600 dark:border-white rounded-xl px-3"
            @if ($company)
                value="{{ $company->$name }}"
            @elseif (! ($errors->first("{{ $name }}")))
                value="{{ old($name) }}"
            @endif

        />
    </div>
@elseif (isset($employee))
    {{-- Employee Inputs --}}
    <div class="w-fit m-auto flex flex-col">
        <label>{{ $label }}
                @if ($required)
                    <span class="text-red-300">*</span>
                @endif
        </label>
        <input name="{{ $name }}" class="border border-slate-600 dark:border-white rounded-xl px-3" 
            @if ($employee)
                value="{{ $employee->$name }}
            @elseif (! ($errors->first("{{ $name }}")))
                value="{{ old($name) }}"
            @endif
        />
    </div>
@endif



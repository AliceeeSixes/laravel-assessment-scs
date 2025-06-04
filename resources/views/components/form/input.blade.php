@props(["name"=>"","label"=>"Input", "company", "employee", "required"=>""])


    <div class="w-2xs m-auto flex flex-col text-lg">
        <label>{{ $label }}
                @if ($required)
                    <span class="text-red-300">*</span>
                @endif
        </label>
        <input name="{{ $name }}" class="text-black border border-transparent bg-white rounded-xl px-3" 

            @if (isset($company))
                @if ($company)
                    value="{{ $company->$name }}"
                @elseif (! ($errors->first("{{ $name }}")))
                    value="{{ old($name) }}"
                @endif
            @elseif (isset($employee))
                @if ($employee)
                    value="{{ $employee->$name }}"
                @elseif (! ($errors->first("{{ $name }}")))
                    value="{{ old($name) }}"
                @endif
            @endif
        />
    </div>



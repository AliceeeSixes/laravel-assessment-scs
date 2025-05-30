<x-layout>
    <x-page-title>
        @if ($employee)
            Edit Employee
        @else
            Create Employee
        @endif

    </x-page-title>

    <x-panel class="sm:w-md lg:w-xl m-auto">
        <!-- New Employee Form -->
        <form method="POST" action="" class="flex gap-5 flex-col p-5">
            @csrf
            @if ($employee)
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


            <h3 class="text-center text-xl">Employee Details</h3>

            <div class="w-fit m-auto flex flex-col">
                <label>First Name</label>
                <input name="first_name" class="border border-black rounded-xl px-3" 
                    @if ($employee)
                        value="{{ $employee->first_name }}"
                    @endif
                />
            </div>

            <div class="w-fit m-auto flex flex-col">
                <label>Last Name</label>
                <input name="last_name" class="border border-black rounded-xl px-3" 
                    @if ($employee)
                        value="{{ $employee->last_name }}"
                    @endif
                />
            </div>

            <div class="w-fit m-auto flex flex-col">
                <label>Email</label>
                <input name="email" class="border border-black rounded-xl px-3" 
                    @if ($employee)
                        value="{{ $employee->email }}"
                    @endif
                />
            </div>

            <div class="w-fit m-auto flex flex-col">
                <label>Phone</label>
                <input name="phone" class="border border-black rounded-xl px-3" 
                    @if ($employee)
                        value="{{ $employee->phone }}"
                    @endif
                />
            </div>

            <div class="w-fit m-auto flex flex-col">
                <label>Job Title</label>
                <input name="job_title" class="border border-black rounded-xl px-3" 
                    @if ($employee)
                        value="{{ $employee->job_title }}"
                    @endif
                />
            </div>

            <div class="w-fit m-auto flex flex-col">
                <label>Company</label>
                <select name="company_id" class="border border-black rounded-lg">
                    <option value="" class="text-black">Select A Company</option>
                        @php
                            $companies = App\Models\Company::orderBy("name")->get();
                        @endphp
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" class="text-black"
                                @php
                                    // Check if adding employee to a specific company
                                    if (isset($_GET["company"])) {
                                        $addToCompany = $_GET["company"];
                                    } else {
                                        $addToCompany = 0;
                                    }
                                @endphp

                                @if (($employee && $employee->company_id == $company->id) || ($addToCompany == $company->id))
                                    {{-- Auto select company if editing existing employee or adding to specific company --}}
                                    selected
                                @endif>
                                {{$company->name}}</option>
                        @endforeach
                </select>
            </div>

            <div class="flex gap-5 justify-center">
                <x-button colour="red" href="/employees" class="px-3 py-1 rounded-lg transition-bg duration-300">Cancel</x-button>
                <x-button colour="green" type="submit" class="px-3 py-1 rounded-lg transition-bg duration-300 cursor-pointer">Submit</x-button>
            </div>

        </form>


    </x-panel>

</x-layout>
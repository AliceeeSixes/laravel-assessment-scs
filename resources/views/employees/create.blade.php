<x-layout>
    <x-page-title>
        @if ($employee)
            Edit Employee
        @else
            @php
                $employee = "";
            @endphp
            Create Employee
        @endif

    </x-page-title>

    <x-panel class="sm:w-md lg:w-xl m-auto bg-gray-200 dark:bg-slate-950 rounded-xl">
        <!-- New Employee Form -->
        <form method="POST" action="" class="flex gap-5 flex-col p-5">
            @csrf
            {{-- Idempotency Token (skip duplicate requests) --}}
            @php
                $time = time();
                $rng = rand(0, 1000000);
                $requestToken = $time . "-" . $rng;
            @endphp

            <input type="hidden" name="request_token" value="{{ $requestToken }}"/>
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


            <h3 class="text-center text-2xl">Employee Details</h3>

            <x-form.input name="first_name" label="First Name" :employee=$employee :required="true"/>

            <x-form.input name="last_name" label="Last Name" :employee=$employee :required="true"/>

            <x-form.input name="email" label="Email" :employee=$employee/>

            <x-form.input name="phone" label="Phone" :employee=$employee/>

            <x-form.input name="job_title" label="Job Title" :employee=$employee/>

            <div class="w-fit m-auto flex flex-col">
                <label>Company
                    <span class="text-red-300">
                        *
                    </span>
                </label>
                <select name="company_id" class="text-black bg-white w-2xs px-3 border border-transparent rounded-xl">
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
                                @elseif ($company->id == old("company_id"))
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
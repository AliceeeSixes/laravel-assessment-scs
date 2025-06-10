<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::with("company")->orderBy("updated_at", "DESC")->simplePaginate(10);
        return view("employees.index", ["employees"=>$employees]);
    }

    public function show($id) {
        $employee = Employee::find($id);
        return view("employees.show", ["employee"=>$employee]);
    }

    public function create($id = null) {
        if ($id) {
            $employee = Employee::find($id);
        } else {
            $employee = null;
        }
        return view("employees.create", ["employee"=>$employee]);
    }

    public function store(Request $request) {

        // Idempotency Token (skip duplicate requests)
        $requestToken = $request->request_token;
        $exists = count((DB::table("request_tokens")->select("request_token")->where("request_token", $requestToken))->get());
        if (! $exists) {
            DB::table("request_tokens")->insert([
                "request_token" => $requestToken
            ]);
        } else {
            return redirect("/employees");
        }

        $validatedAttributes = $request->validate([
            "first_name"=>["required", "max:128"],
            "last_name"=>["required", "max:128"],
            "company_id"=>["required"],
            "email"=>["nullable", "email:rfc", "max:128"],
            "phone"=>["nullable", "max:128"],
            "job_title"=>["nullable", "max:128"]
        ]);
        Employee::create($validatedAttributes);

        $referrer = $request->referrer;
        if ($referrer) {
            return redirect("/companies/$referrer");
        } else {
                return redirect("/employees");
        }


    }

    public function update($id, Request $request) {

        // Idempotency Token (skip duplicate requests)
        $requestToken = $request->request_token;
        $exists = count((DB::table("request_tokens")->select("request_token")->where("request_token", $requestToken))->get());
        if (! $exists) {
            DB::table("request_tokens")->insert([
                "request_token" => $requestToken
            ]);
        } else {
            return redirect("/employees/$id");
        }

        $validatedAttributes = $request->validate([
            "first_name"=>["required", "max:128"],
            "last_name"=>["required", "max:128"],
            "company_id"=>["required"],
            "email"=>["nullable", "email:rfc", "max:128"],
            "phone"=>["nullable", "max:128"],
            "job_title"=>["nullable", "max:128"]
        ]);
        Employee::where("id",$id)->update($validatedAttributes);
        return redirect("/employees/$id");
    }

    public function destroy($id) {
        // Find Company
        $employee = Employee::find($id);
        // Destroy Company
        $employee->delete();
        // Redirect
        return redirect("/employees");
    }
}

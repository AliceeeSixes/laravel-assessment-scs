<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::with("employees")->orderBy("updated_at", "DESC")->simplePaginate(10);
        return view("companies.index", ["companies"=>$companies]);
    }

    public function show($id) {
        $company = Company::find($id);
        $employees = $company->employees;
        return view("companies.show", ["company"=>$company, "employees"=>$employees]);
    }

    public function create($id = null) {
        if ($id) {
            $company = Company::find($id);
        } else {
            $company = null;
        }
        return view("companies.create", ["company"=>$company]);
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
            return redirect("/companies");
        }

        $validatedAttributes = $request->validate([
            "name"=>["required", Rule::unique("companies"), "max:128"],
            "website"=>["nullable", "url", "max:128"],
            "email"=>["nullable", "email:rfc", "max:128"]
        ]);

        $logo = $request->validate([
            "logo"=>[File::types(["png","jpg","webp"])->max("10mb"), "dimensions:mind_width=100,min_height=100", "nullable"]
        ]);

        if ($logo) {
            $validatedAttributes["logo"] = $request->logo->store("logos");
        }

        Company::create($validatedAttributes);
        return redirect("/companies");
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
            return redirect("/companies");
        }

        $validatedAttributes = $request->validate([
            "name"=>["required", Rule::unique("companies")->ignore($id), "max:128"],
            "website"=>["nullable", "url", "max:128"],
            "email"=>["nullable", "email:rfc", "max:128"]
        ]);


        $logo = $request->validate([
            "logo"=>[File::types(["png","jpg","webp"])->max("10mb"), "dimensions:mind_width=100,min_height=100", "nullable"]
        ]);

        if ($logo) {
            $validatedAttributes["logo"] = $request->logo->store("logos");
        }


        Company::where("id",$id)->update($validatedAttributes);
        return redirect("/companies");
    }

    public function destroy($id) {
        // Find Company
        $company = Company::find($id);
        // Destroy Company
        $company->delete();
        // Redirect
        return redirect("/companies");
    }
}

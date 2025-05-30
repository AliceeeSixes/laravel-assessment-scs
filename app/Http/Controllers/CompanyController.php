<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all();
        return view("companies.index", ["companies"=>$companies]);
    }

    public function show($id) {
        $company = Company::find($id);
        return view("companies.show", ["company"=>$company]);
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
        $validatedAttributes = $request->validate([
            "name"=>["required", Rule::unique("companies"), "max:128"],
            "website"=>["nullable", "url", "max:128"],
            "email"=>["nullable", "email:rfc", "max:128"]
        ]);

        $logo = $request->validate([
            "logo"=>[File::types(["png","jpg","webp"]), "nullable"]
        ]);

        if ($logo) {
            $validatedAttributes["logo"] = $request->logo->store("logos");
        }

        Company::create($validatedAttributes);
        return redirect("/companies");
    }

    public function update($id, Request $request) {
        $validatedAttributes = $request->validate([
            "name"=>["required", Rule::unique("companies")->ignore($id), "max:128"],
            "website"=>["nullable", "url", "max:128"],
            "email"=>["nullable", "email:rfc", "max:128"]
        ]);


        $logo = $request->validate([
            "logo"=>[File::types(["png","jpg","webp"]), "nullable"]
        ]);

        if ($logo) {
            $validatedAttributes["logo"] = $request->logo->store("logos");
        }


        Company::where("id",$id)->update($validatedAttributes);
        return redirect("/companies");
    }
}

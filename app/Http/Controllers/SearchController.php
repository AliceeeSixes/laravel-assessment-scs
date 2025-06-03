<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // Searches Companies
    public function Companies() {
        $searchTerm = htmlspecialchars(request("q"));
        if ($searchTerm) {
            $companies = Company::with("employees")->where("name", "like", "%{$searchTerm}%")->orderBy("updated_at", "DESC")->simplePaginate(10);
            return view("companies.index", ["companies"=>$companies]);
        } else {
            return redirect("/companies");
        }
    }

    // Searches Employee
    public function Employees() {
        $searchTerm = htmlspecialchars(request("q"));
        if ($searchTerm) {
            $employees = Employee::with("company")->where("name", "like", "%{$searchTerm}%")->orderBy("updated_at", "DESC")->simplePaginate(10);
            return view("employees.index", ["employees"=>$employees]);
        } else {
            return redirect("/employees");
        }
    }
}

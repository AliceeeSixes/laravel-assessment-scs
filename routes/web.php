<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Company;
use App\Models\Employee;


// Dashboard
Route::middleware(["auth"])->group(function () {
    Route::get('/', function () {
        $companies = Company::orderBy("updated_at", "DESC")->simplePaginate(5);
        $employees = Employee::orderBy("updated_at", "DESC")->simplePaginate(5);
        return view("/home", ["companies"=>$companies,"employees"=>$employees]);
    });
});


// Companies
Route::middleware(["auth"])->group(function () {
    Route::get('/companies', [CompanyController::class, "index"]);
    Route::get('/companies/create', [CompanyController::class, "create"]);
    Route::post('/companies/create', [CompanyController::class, "store"]);
    Route::get('/companies/search', [SearchController::class, "companies"]);
    Route::get('/companies/edit/{id}', [CompanyController::class, "create"]);
    Route::patch('/companies/edit/{id}', [CompanyController::class, "update"]);
    Route::post('/companies/delete/{id}', [CompanyController::class, "destroy"]);
    Route::get('/companies/{id}', [CompanyController::class, "show"]);
    Route::post('/companies/{id}', [CompanyController::class, "show"]); // Needed for buttons inside cards that act as links
});



// Employees
Route::middleware(["auth"])->group(function () {
    Route::get('/employees', [EmployeeController::class, "index"]);
    Route::get('/employees', [EmployeeController::class, "index"]);
    Route::get('/employees/create', [EmployeeController::class, "create"]);
    Route::get('/employees/search', [SearchController::class, "employees"]);
    Route::get('/employees/edit/{id}', [EmployeeController::class, "create"]);
    Route::get('/employees/{id}', [EmployeeController::class, "show"]);
    Route::post('/employees/create', [EmployeeController::class, "store"]);
    Route::patch('/employees/edit/{id}', [EmployeeController::class, "update"]);
    Route::post('/employees/delete/{id}', [EmployeeController::class, "destroy"]);
});


// Auth
Route::get("/login", [SessionController::class, "create"])->name("login");
Route::post("/login", [SessionController::class, "store"]);
Route::post("/logout", [SessionController::class, "destroy"]);
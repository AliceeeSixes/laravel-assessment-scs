<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/companies");
});


// Companies
Route::middleware(["auth"])->group(function () {
    Route::get('/companies', [CompanyController::class, "index"]);
    Route::get('/companies/create', [CompanyController::class, "create"]);
    Route::post('/companies/create', [CompanyController::class, "store"]);
    Route::get('/companies/edit/{id}', [CompanyController::class, "create"]);
    Route::get('/companies/{id}', [CompanyController::class, "show"]);
    Route::post('/companies/{id}', [CompanyController::class, "show"]); // Needed for buttons inside cards that act as links
    Route::patch('/companies/edit/{id}', [CompanyController::class, "update"]);
});



// Employees
Route::middleware(["auth"])->group(function () {
    Route::get('/employees', [EmployeeController::class, "index"]);
    Route::get('/employees', [EmployeeController::class, "index"]);
    Route::get('/employees/create', [EmployeeController::class, "create"]);
    Route::get('/employees/edit/{id}', [EmployeeController::class, "create"]);
    Route::get('/employees/{id}', [EmployeeController::class, "show"]);
    Route::post('/employees/create', [EmployeeController::class, "store"]);
    Route::patch('/employees/edit/{id}', [EmployeeController::class, "update"]);
});


// Auth
Route::get("/login", [SessionController::class, "create"])->name("login");
Route::post("/login", [SessionController::class, "store"]);
Route::post("/logout", [SessionController::class, "destroy"]);
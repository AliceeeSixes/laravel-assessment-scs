<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/companies");
});


// Companies
Route::get('/companies', [CompanyController::class, "index"]);
Route::get('/companies/create', [CompanyController::class, "create"]);
Route::get('/companies/edit/{id}', [CompanyController::class, "create"]);
Route::get('/companies/{id}', [CompanyController::class, "show"]);
Route::post('/companies/create', [CompanyController::class, "store"]);
Route::patch('/companies/edit/{id}', [CompanyController::class, "update"]);



Route::get('/employees', [EmployeeController::class, "index"]);
Route::get('/employees', [EmployeeController::class, "index"]);
Route::get('/employees/create', [EmployeeController::class, "create"]);
Route::get('/employees/edit/{id}', [EmployeeController::class, "create"]);
Route::get('/employees/{id}', [EmployeeController::class, "show"]);
Route::post('/employees/create', [EmployeeController::class, "store"]);
Route::patch('/employees/edit/{id}', [EmployeeController::class, "update"]);


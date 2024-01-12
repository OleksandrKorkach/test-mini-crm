<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/companies');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/edit/{employeeId}', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::patch('/employees/{employeeId}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employeeId}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/edit/{companyId}', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::post('/companies/{companyId}/employee', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::patch('/companies/{companyId}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{companyId}', [CompanyController::class, 'destroy'])->name('companies.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';

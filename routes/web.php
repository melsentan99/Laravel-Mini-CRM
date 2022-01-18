<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\TimeZoneController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\SellSummaryController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return redirect('login');
});

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () { 


    Route::get('timezone', [TimeZoneController::class, 'indexTimeZone'])->name('timezone');
    Route::get('timezone/change', [TimeZoneController::class, 'setTimeZone'])->name('setTimeZone');

    Route::get('/home', [CompaniesController::class, 'index'])->name('company.index');
    Route::post('/company/submit', [CompaniesController::class, 'store'])->name('company.store');
    Route::get('/company/{company}', [CompaniesController::class, 'show'])->name('company.show');
    Route::get('/company/{company}/edit', [CompaniesController::class, 'edit'])->name('company.edit');
    Route::patch('/company/{company}/update', [CompaniesController::class, 'update'])->name('company.update');
    Route::delete('/company/{company}', [CompaniesController::class, 'destroy'])->name('company.destroy');
    Route::get('/list/{company}', [CompaniesController::class, 'showEmployees'])->name('showEmployees');
    

    Route::get('/employee', [EmployeesController::class, 'index'])->name('employee.index');
    Route::post('/employee/submit', [EmployeesController::class, 'store'])->name('employee.store');
    Route::get('/employee/{employee}', [EmployeesController::class, 'show'])->name('employee.show');
    Route::get('/employee/{employee}/edit', [EmployeesController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/{employee}/update', [EmployeesController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{employee}', [EmployeesController::class, 'destroy'])->name('employee.destroy');



   
    Route::resource('items', ItemController::class);
    Route::resource('sells', SellController::class);
    Route::resource('sell-summary', SellSummaryController::class);
    Route::post('summary-per-day', [SellSummaryController::class, 'show'])->name('sellsummary.show');
    Route::get('summary-per-employee/{employee}', [SellSummaryController::class, 'summaryPerEmployee'])->name('perEmployee');

});


Route::get('tes', [EmployeesController::class, 'tes']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/{company}/list-employee', [EmployeesController::class, 'apiShowEmployee']);
});




Route::get('/token/{company}', [CompaniesController::class, 'generateCompanyToken'])->name('showEmployees');



Route::get('wa', [CompaniesController::class, 'whatsapp'])->name('whatsapp');

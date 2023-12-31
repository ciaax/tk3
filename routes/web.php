<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController; //add the ControllerNameSpace
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SalesController;
use App\Models\Sales;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource("/item", ItemController::class);

Route::middleware('auth')->group(function () {
    Route::prefix("/item")->group(function () {
        Route::get("/", [ItemController::class, "index"])->name('item');
        Route::get("/show/{id}", [ItemController::class, "show"])->name('item.show');

        Route::middleware(['admin-staff'])->group(function () {
            Route::get('/create', [ItemController::class, "create"])->name('item.create');
            Route::get("/edit/{id}", [ItemController::class, "edit"])->name('item.edit');
            Route::get("/delete/{id}", [ItemController::class, "destroy"])->name('item.delete');
            Route::post("/update/{id}", [ItemController::class, "update"])->name('item.update');
            Route::post("/store", [ItemController::class, "store"])->name('item.store');
        });
    });

    Route::middleware(['admin-staff'])->group(function () {

        Route::prefix("/customer")->group(function () {
            Route::get("/", [CustomerController::class, "index"])->name('customer');
            Route::get('/create', [CustomerController::class, "create"])->name('customer.create');
            Route::get("/show/{id}", [CustomerController::class, "show"])->name('customer.show');
            Route::get("/edit/{id}", [CustomerController::class, "edit"])->name('customer.edit');
            Route::get("/delete/{id}", [CustomerController::class, "destroy"])->name('customer.delete');
            Route::post("/update/{id}", [CustomerController::class, "update"])->name('customer.update');
            Route::post("/store", [CustomerController::class, "store"])->name('customer.store');
        });

        Route::prefix("/report")->group(function () {
            Route::get("/", [ReportController::class, "index"])->name('report');
        });
    });

    Route::middleware(['admin'])->group(function () {

        Route::prefix("/staff")->group(function () {
            Route::get("/", [StaffController::class, "index"])->name('staff');
            Route::get('/create', [StaffController::class, "create"])->name('staff.create');
            Route::get("/show/{id}", [StaffController::class, "show"])->name('staff.show');
            Route::get("/edit/{id}", [StaffController::class, "edit"])->name('staff.edit');
            Route::get("/delete/{id}", [StaffController::class, "destroy"])->name('staff.delete');
            Route::post("/update/{id}", [StaffController::class, "update"])->name('staff.update');
            Route::post("/store", [StaffController::class, "store"])->name('staff.store');
        });
    });


    Route::prefix("/sales")->group(function () {
        Route::get("/", [SalesController::class, "index"])->name('sales');
        Route::get("/show/{id}", [SalesController::class, "show"])->name('sales.show');
        Route::middleware(['staff'])->group(function () {
            Route::get("/submit/{id}", [SalesController::class, "submit"])->name('sales.submit');
        });

        Route::post("/buy", [SalesController::class, "buy"])->name('item.buy');
    });
});

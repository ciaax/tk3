<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController; //add the ControllerNameSpace

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
    Route::get("/item", [ItemController::class, "index"])->name('item');
    Route::get('/item/create', [ItemController::class, "create"])->name('item.create');
    Route::get("item/{id}", [ItemController::class, "show"])->name('item.show');
    Route::get("/item/edit/{id}", [ItemController::class, "edit"])->name('item.edit');
    Route::get("/item/delete/{id}", [ItemController::class, "destroy"])->name('item.delete');
    Route::post("/item/update/{id}", [ItemController::class, "update"])->name('item.update');
    Route::post("/item/store", [ItemController::class, "store"])->name('item.store');
});
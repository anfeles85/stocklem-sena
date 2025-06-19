<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

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

Route::prefix()->group(function(){
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::prefix()->group(function(){
    Route::get('/index', [PersonController::class, 'index'])->name('person.index');
    Route::get('/create', [PersonController::class, 'create'])->name('person.create');
    Route::get('/store', [PersonController::class, 'store'])->name('person.store');
    Route::get('/edit/{id}', [PersonController::class, 'edit'])->name('person.edit');
    Route::get('/update/{id}', [PersonController::class, 'update'])->name('person.update');
    Route::get('/destroy/{id}', [PersonController::class, 'destroy'])->name('person.destroy');
});

Route::prefix()->group(function(){
    Route::get('/index', [PresentationController::class, 'index'])->name('presentation.index');
    Route::get('/create', [PresentationController::class, 'create'])->name('presentation.create');
    Route::get('/store', [PresentationController::class, 'store'])->name('presentation.store');
    Route::get('/edit/{id}', [PresentationController::class, 'edit'])->name('presentation.edit');
    Route::get('/update/{id}', [PresentationController::class, 'update'])->name('presentation.update');
    Route::get('/destroy/{id}', [PresentationController::class, 'destroy'])->name('presentation.destroy');
});

    Route::prefix()->group(function(){
    Route::get('/index', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::get('/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::get('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
});

    Route::prefix()->group(function(){
    Route::get('/index', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/create', [UnitController::class, 'create'])->name('unit.create');
    Route::get('/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::get('/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/destroy/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');
});



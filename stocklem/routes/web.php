<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ReportController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::prefix('category')->group(function(){
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::prefix('person')->group(function(){
    Route::get('/index', [PersonController::class, 'index'])->name('person.index');
    Route::get('/create', [PersonController::class, 'create'])->name('person.create');
    Route::post('/store', [PersonController::class, 'store'])->name('person.store');
    Route::get('/edit/{id}', [PersonController::class, 'edit'])->name('person.edit');
    Route::put('/update/{id}', [PersonController::class, 'update'])->name('person.update');
    Route::delete('/destroy/{id}', [PersonController::class, 'destroy'])->name('person.destroy');
});

Route::prefix('presentation')->group(function(){
    Route::get('/index', [PresentationController::class, 'index'])->name('presentation.index');
    Route::get('/create', [PresentationController::class, 'create'])->name('presentation.create');
    Route::post('/store', [PresentationController::class, 'store'])->name('presentation.store');
    Route::get('/edit/{id}', [PresentationController::class, 'edit'])->name('presentation.edit');
    Route::put('/update/{id}', [PresentationController::class, 'update'])->name('presentation.update');
    Route::delete('/destroy/{id}', [PresentationController::class, 'destroy'])->name('presentation.destroy');
});

Route::prefix('supplier')->group(function(){
    Route::get('/index', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
});

Route::prefix('unit')->group(function(){
    Route::get('/index', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::put('/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::delete('/destroy/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');
});

Route::prefix('article')->group(function(){
    Route::get('/index', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/destroy/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
});

Route::prefix('entry')->group(function(){
    Route::get('/index', [EntryController::class, 'index'])->name('entry.index');
    Route::get('/create', [EntryController::class, 'create'])->name('entry.create');
    Route::post('/store', [EntryController::class, 'store'])->name('entry.store');
    Route::get('/edit/{id}', [EntryController::class, 'edit'])->name('entry.edit');
    Route::put('/update/{id}', [EntryController::class, 'update'])->name('entry.update');
    Route::delete('/destroy/{id}', [EntryController::class, 'destroy'])->name('entry.destroy');
});

Route::prefix('issue')->group(function(){
    Route::get('/index', [IssueController::class, 'index'])->name('issue.index');
    Route::get('/create', [IssueController::class, 'create'])->name('issue.create');
    Route::post('/store', [IssueController::class, 'store'])->name('issue.store');
    Route::get('/edit/{id}', [IssueController::class, 'edit'])->name('issue.edit');
    Route::put('/update/{id}', [IssueController::class, 'update'])->name('issue.update');
    Route::delete('/destroy/{id}', [IssueController::class, 'destroy'])->name('issue.destroy');
});


Route::prefix('auth')->group(function(){
    Route::get('/changePassword', [ChangePasswordController::class, 'index'])->name('auth.changePassword');
    Route::post('/changePassword', [ChangePasswordController::class, 'changePassword'])->name('auth.changePassword');
});

Route::prefix('reports')->group(function () {
    Route::get('/index', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/export_articles', [ReportController::class, 'export_articles'])->name('reports.articles');
    Route::post('/export_movements_by_article', [ReportController::class, 'export_movements_by_article'])->name('reports.movements_article');
    Route::post('/export_all_movements_by_date', [ReportController::class, 'export_all_movements_by_date'])->name('reports.all_movements_date');

});
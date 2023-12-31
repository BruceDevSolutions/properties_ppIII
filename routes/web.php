<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TagController;
use App\Models\Property;
use App\Models\User;
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

Route::get('/', [PropertyController::class, 'index'])->name('properties.index'); // Todas las propiedades

Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');


/* Rutas de administración */
Route::get('admin', function() {
    return view('admin.index');
})->middleware(['auth', 'verified']);


// Categor[ias]
Route::get('admin/categories', [AdminCategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.categories.index');

Route::get('admin/categories/create', [AdminCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('admin.categories.create');

Route::post('admin/categories', [AdminCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('admin.categories.store');

Route::get('admin/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('admin.categories.edit');

Route::put('admin/categories/{category}', [AdminCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('admin.categories.update');

Route::delete('admin/categories/{category}', [AdminCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('admin.categories.destroy');


// Admin properties
Route::get('admin/properties', [AdminPropertyController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.properties.index');

Route::get('admin/properties/create', [AdminPropertyController::class, 'create'])->middleware(['auth', 'verified'])->name('admin.properties.create');

Route::post('admin/properties', [AdminPropertyController::class, 'store'])->middleware(['auth', 'verified'])->name('admin.properties.store');

Route::get('admin/properties/{property}/edit', [AdminPropertyController::class, 'edit'])->middleware(['auth', 'verified'])->name('admin.properties.edit');

Route::put('admin/properties/{property}', [AdminPropertyController::class, 'update'])->middleware(['auth', 'verified'])->name('admin.properties.update');










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Get y Post.
// REST = Gira en torno a recursos.

// Get, post, patch, put, delete


// Get = para obtener un recurso o varios recursos. Son las úniacs que se pueden acceder desde la URL del navegador


// Post = Para crear un recurso
// Patch, put = Para actualizar un recurso
// Delete = Para eliminar un recurso
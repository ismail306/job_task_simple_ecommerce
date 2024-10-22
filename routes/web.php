<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('admin/categories', CategoryController::class, ['names' => 'categories']);
    Route::resource('admin/sub-categories', SubCategoryController::class, ['names' => 'sub-categories']);
    Route::get('/get-subcategories-by-category/{catId}', [SubCategoryController::class, 'subCatByCat'])->name('get-subcategories-by-category');
    Route::resource('admin/products', ProductController::class, ['names' => 'products']);
});

Route::get('/products/category/{name}/{id}', [HomeController::class, 'getProductsByCat'])->name('getProductsByCat');
Route::get('/products/sub-category/{name}/{id}', [HomeController::class, 'getProductsBySCat'])->name('getProductsBySCat');
Route::get('/product/{slug}', [HomeController::class, 'getProductBySlug'])->name('getProductBySlug');
// Route::get('admin/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

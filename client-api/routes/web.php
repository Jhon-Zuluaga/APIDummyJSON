<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('auth.index'); // Redirige al login
});

// Dashboard o página principal después de login
Route::get('/index', function () {
    return view('index');
})->name('index');

// Grupo de autenticación
Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('/index', [AuthController::class,'index'])->name('index'); // vista de login
    Route::post('/login', [AuthController::class,'login'])->name('login');
    Route::get('/register', [AuthController::class,'create'])->name('register');
    Route::post('/register', [AuthController::class,'store'])->name('store');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});

// Rutas para la API USER
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

// Rutas de producto
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

// Rutas de receta
Route::prefix('recipe')->group(function () {
    Route::get('/', [RecipeController::class, 'index'])->name('recipe.index');
    Route::get('/create', [RecipeController::class, 'create'])->name('recipe.create');
    Route::post('/', [RecipeController::class, 'store'])->name('recipe.store');
    Route::get('/edit/{id}', [RecipeController::class, 'edit'])->name('recipe.edit');
    Route::put('/{id}', [RecipeController::class, 'update'])->name('recipe.update');
    Route::delete('/{id}', [RecipeController::class, 'destroy'])->name('recipe.destroy');
});
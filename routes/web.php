<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassificationController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\AuthController as UserAuthController;

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/about', [GuestController::class, 'about'])->name('about');
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');

// User Authentication Routes
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAuthController::class, 'login']);
Route::get('/register', [UserAuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserHomeController::class, 'index'])->name('user.home');
    Route::get('/books/{book}', [UserHomeController::class, 'show'])->name('user.books.show');
    
    // Cart Routes
    Route::get('/cart', [App\Http\Controllers\User\CartController::class, 'index'])->name('user.cart.index');
    Route::post('/cart', [App\Http\Controllers\User\CartController::class, 'store'])->name('user.cart.store');
    Route::delete('/cart/{cart}', [App\Http\Controllers\User\CartController::class, 'destroy'])->name('user.cart.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('classifications', ClassificationController::class)->names([
            'index' => 'classifications.index',
            'create' => 'classifications.create',
            'store' => 'classifications.store',
            'show' => 'classifications.show',
            'edit' => 'classifications.edit',
            'update' => 'classifications.update',
            'destroy' => 'classifications.destroy',
        ]);

        Route::resource('types', TypeController::class)->names([
            'index' => 'types.index',
            'create' => 'types.create',
            'store' => 'types.store',
            'edit' => 'types.edit',
            'update' => 'types.update',
            'destroy' => 'types.destroy',
        ]);

        Route::resource('books', BookController::class)->names([
            'index' => 'books.index',
            'create' => 'books.create',
            'store' => 'books.store',
            'edit' => 'books.edit',
            'update' => 'books.update',
            'destroy' => 'books.destroy',
        ]);

        // Route::resource('carts', CartController::class)->only([
        //     'index', 'destroy'
        // ])->names([
        //     'index' => 'carts.index',
        //     'destroy' => 'carts.destroy',
        // ]);

        Route::resource('categories', CategoryController::class)->names([
            'index' => 'categories.index',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'edit' => 'categories.edit',
            'update' => 'categories.update',
            'destroy' => 'categories.destroy',
        ]);
    });
});

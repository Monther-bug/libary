<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassificationController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return redirect()->route('admin.classifications.index');
});

Route::prefix('admin')->name('admin.')->group(function () {
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

    Route::resource('carts', CartController::class)->only([
        'index', 'destroy'
    ])->names([
        'index' => 'carts.index',
        'destroy' => 'carts.destroy',
    ]);

    Route::resource('categories', CategoryController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);
});

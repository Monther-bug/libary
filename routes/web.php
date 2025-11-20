<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassificationController;

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

});

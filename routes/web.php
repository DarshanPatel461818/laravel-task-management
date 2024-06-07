<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('tasks')->name('task.')->group(function (){
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit');
    Route::post('/{task}/update', [TaskController::class, 'update'])->name('update');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy');
    Route::post('/massDelete', [TaskController::class, 'massDelete'])->name('massDelete');
    Route::post('/export', [TaskController::class, 'export'])->name('export');
    Route::post('/import', [TaskController::class, 'import'])->name('import');
});

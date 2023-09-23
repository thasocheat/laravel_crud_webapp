<?php

use App\Http\Controllers\Admin\DepartmentsController;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;






/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');
// Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth']],function(){

  



    // Department Routes
    Route::get('/department', [DepartmentsController::class, 'index'])->name('index');
    Route::post('/store', [DepartmentsController::class, 'store'])->name('store');
    Route::get('/fetchall', [DepartmentsController::class, 'fetchAll'])->name('fetchAll');
    Route::delete('/delete', [DepartmentsController::class, 'delete'])->name('delete');
    Route::get('/edit', [DepartmentsController::class, 'edit'])->name('edit');
    Route::post('/update', [DepartmentsController::class, 'update'])->name('update');

// });
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


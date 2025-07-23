<?php

use App\Http\Controllers\admin\catgiryController;
use App\Http\Controllers\auth\authController;
use App\Http\Controllers\admin\dashController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\clint\clintController;
use App\Http\Controllers\clint\homeController;
use Illuminate\Support\Facades\Route;

//route login------------------------------------------------------------
Route::get('/login', [AuthController::class, 'index'])
    ->middleware('guest')
    ->name('login');

//Route::get('login',[authController::class,'index'])->name('login');forgit.password
Route::post('login', [authController::class,'checkuser'])->name('login');
Route::get('forgit/password', [authController::class,'forgitPassword'])->name('forgitPassword');
Route::post('/resetPassword', [authController::class,'resetPassword'])->name('resetPassword');

Route::post('/rest.update-password/{id}', [authController::class,'updatePassword'])->name('update.password');

Route::get('rigster',[registerController::class,'rigster'])->name('rigster');
Route::post('rigster',[registerController::class,'store'])->name('adduser');
Route::get('logout',[authController::class,'logout'])->name('logout');

//end route login-------------------------------------------------------------




//route dashbord page Admin--------------------------------------------------------------
Route::middleware(['auth','checkUser'])->group(function () {

    Route::get('dash',[dashController::class,'index'])->name('dash');
    //---------------catgory
    Route::get('addCatgory',[catgiryController::class,'index'])->name('page.addCatgory');
    Route::post('addCatgory',[catgiryController::class,'store'])->name('add.catgory');
    
    Route::get('listCatgory',[catgiryController::class,'listCatgory'])->name('listCatgory');
    //-----------------end catgory

    //----------------product
    Route::get('addProduct',[productController::class,'index'])->name('addProduct');
    Route::post('storaddProduct',[productController::class,'store'])->name('storaddProduct');
    Route::get('listProduct',[productController::class,'show'])->name('listProduct');
    Route::get('editproduct/{id}',[productController::class,'editProduct'])->name('editproduct');
    Route::post('updateproduct/{id}',[productController::class,'updateProduct'])->name('updateProduct');

    //--------------------end product

});

 // end route dashbord page Admin-----------------------------------------------------



  






Route::get('home',[homeController::class,'index'])->name('home');


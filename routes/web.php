<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModelshoController;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\Catalalog;
use App\Http\Controllers\CatalogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {



        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


        //brand start
        Route::resource('brand', BrandController::class);
        //brand end


        //categories start
        Route::resource('category', CategoryController::class);
        //categories end

        //models start
        Route::resource('modelsho', ModelshoController::class);

        //models end


        //shoes start
        Route::resource('shoes', ShoeController::class);


        //shoes end

        //shopping cart start
        //shopping cart end

        // sales start
        //sales end


         //report start
        //report end

        //catalaog start
        Route::resource('catalog', CatalogController::class);


        //catalog end




    });
});

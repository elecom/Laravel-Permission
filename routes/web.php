<?php

use Illuminate\Support\Facades\Route;

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
    //return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

// SOCIAL LOGIN
Route::get('login/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('login/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);

Route::group(['middleware' => 'auth'], function($route){
    
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //PERFILES
        
    Route::group(['prefix' => 'profiles'], function($route){
        
        Route::get('/', [App\Http\Controllers\Admin\ProfileController::class, 'index']);
    
        Route::get('/datatable', [App\Http\Controllers\Admin\ProfileController::class, 'datatable'])->name('profiles-datatable');

    });
    
    // USUARIOS
    Route::group(['prefix' => 'users'], function($route){
            
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index']);
    
    });
     
    
});




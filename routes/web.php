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
    return view('welcome');
});

// Route::get('/hello',function(){
//     return 'Hello World!';
//    });


//    Route::get('list', 'App\Http\Controllers\AccountController@list');
//    Route::get('show/{id}', 'App\Http\Controllers\AccountController@show');
//    Route::get('display', [App\Http\Controllers\AccountController::class, 'display'])->name('display_account');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/uploadImages/{animalid}', [App\Http\Controllers\AccountController::class, 'uploadImageForm'])->name('uploadImageForm');
Route::post('/uploadImages', [App\Http\Controllers\AccountController::class, 'uploadImages'])->name('uploadImages');

Route::get('/approvedRequests', [App\Http\Controllers\requestsController::class, 'approvedRequestForm'])->name('approvedRequest');
Route::get('/deniedRequests', [App\Http\Controllers\requestsController::class, 'deniedRequestForm'])->name('deniedRequest');

Route::get('/showAnimals', [App\Http\Controllers\AccountController::class, 'showAnimals'])->name('showAnimals');
Route::post('/showAnimals', [App\Http\Controllers\AccountController::class, 'adoptionInfo'])->name('adoptionInfo');

Route::get('/uploadNewAnimals', [App\Http\Controllers\AccountController::class, 'uploadAnimalForm'])->name('uploadNewAnimals');
Route::post('/uploadNewAnimals', [App\Http\Controllers\AccountController::class, 'uploadAnimalInfo'])->name('animalData');

Route::get('/manageRequests', [App\Http\Controllers\requestsController::class, 'manageRequestsForm'])->name('manageRequests');
Route::post('/manageRequests', [App\Http\Controllers\requestsController::class, 'processRequest'])->name('processRequest');


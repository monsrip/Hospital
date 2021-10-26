<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\homeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
 Route::get('/',[homeController::class,"index"]);



Route::get('/home',[homeController::class,"redirects"])->middleware('auth','verified');
Route::post('/appointment',[homeController::class,"appointment"]);
Route::get('/myappointment',[homeController::class,"myappointment"]);
Route::get('/removeappointment/{id}',[homeController::class,"removeappointment"]);


Route::get('/showdoctor',[adminController::class,"showdoctor"]);
Route::post('/doctorupload',[adminController::class,"doctorupload"]);
Route::get('/appointment',[adminController::class,"appointment"]);
Route::get('/approve/{id}',[adminController::class,"approve"]);
Route::get('/cancel/{id}',[adminController::class,"cancel"]);
Route::get('/canceldoctor/{id}',[adminController::class,"canceldoctor"]);
Route::get('/updatedoctor/{id}',[adminController::class,"updatedoctor"]);
Route::post('/doctorupdate/{id}',[adminController::class,"doctorupdate"]);
Route::get('/emailview/{id}',[adminController::class,"emailview"]);
Route::post('/sendemail/{id}',[adminController::class,"sendemail"]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

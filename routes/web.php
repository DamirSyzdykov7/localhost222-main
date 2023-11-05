<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorizeController;
//use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/login', 'AuthorizeController@showLoginForm');
Route::get('/', [AuthorizeController::class, 'showLoginForm']);
//Route::post('/login', 'AuthorizeController@login');
Route::post('/login', [AuthorizeController::class, 'login']);
//Route::post('/register', 'AuthController@ShowRegistForm');
Route::get('/register', [AuthorizeController::class, 'ShowRegistForm']);
Route::post('/register', [AuthorizeController::class, 'registration']);
//Route::get('/main', 'MainController@index');
Route::get('/main', [MainController::class, 'ShowMainView'])->name('main');
Route::post('/addToCart', [MainController::class, 'addToCart'])->name('addToCart');
Route::get('/Organization', [MainController::class, 'Organization'])->name('Organization');
//Route::get('/Cart', [MainController::class, 'showViewCart'])->name('Cart');
Route::get('/makeOrder', [MainController::class, 'makeOrder'])->name('makeOrder');

//Route::get("/", function(){
   // echo 'все работает';
//});
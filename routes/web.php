<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\registerController;

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
    return view('welcome',[
        'title' => 'Home'    
    ]);
});
Route::get('/aboutme', function(){
    return view('aboutme', [
        'title' => 'About Me',
        'name' => 'bingus',
        'email' => 'bingus@binus.ac.id',
        'number' => '081-1234'
    ]);
});
//Login Controller
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('guest');
Route::POST('/login', [loginController::class, 'authenticate'])->middleware('guest');
Route::POST('logout', [loginController::class, 'logout'])->middleware('auth');

//Register Controller
Route::get('/register', [registerController::class, 'register'])->middleware('guest');
Route::POST('/register', [registerController::class, 'store'])->middleware('guest');

//Item Controller
Route::get('/myitems', [itemController::class, 'index'])->middleware('auth');
Route::get('/create-item', [itemController::class, 'createItem']);
Route::POST('/store-item', [itemController::class, 'storeItem']);
Route::get('/show-item/{item:id}', [itemController::class, 'showItem']);
Route::DELETE('/delete-item/{item:id}', [itemController::class, 'delete']);
Route::get('/edit-item/{item:id}', [itemController::class, 'edit']);
Route::PATCH('/update-item/{item:id}', [itemController::class, 'update']);

//Category Controller
Route::get('/create-category', [categoryController::class, 'createCategory']);
Route::POST('/store-category', [categoryController::class, 'storeCategory']);
Route::get('/categories', [categoryController::class, 'index']);
Route::get('/show-category/{category:id}',[categoryController::Class, 'showCategory']);
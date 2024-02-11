<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
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
    $user = Auth::user();
    return view('aboutme', [
        'title' => 'About Me',
        'name' => $user->name,
        'email' => $user->email,
        'number' => $user->number
    ]);
})->middleware('auth');
//Login Controller
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('guest');
Route::POST('/login', [loginController::class, 'authenticate'])->middleware('guest');
Route::POST('logout', [loginController::class, 'logout'])->middleware('auth');

//Register Controller
Route::get('/register', [registerController::class, 'register'])->middleware('guest');
Route::POST('/register', [registerController::class, 'store'])->middleware('guest');

//Item Controller
Route::get('/myitems', [itemController::class, 'index'])->middleware('auth');
Route::get('/create-item', [itemController::class, 'createItem'])->middleware('admin');
Route::POST('/store-item', [itemController::class, 'storeItem'])->middleware('admin');
Route::get('/show-item/{item:id}', [itemController::class, 'showItem']);
Route::DELETE('/delete-item/{item:id}', [itemController::class, 'delete'])->middleware('admin');
Route::get('/edit-item/{item:id}', [itemController::class, 'edit'])->middleware('admin');
Route::PATCH('/update-item/{item:id}', [itemController::class, 'update'])->middleware('admin');

//Category Controller
Route::get('/create-category', [categoryController::class, 'createCategory'])->middleware('admin');
Route::POST('/store-category', [categoryController::class, 'storeCategory'])->middleware('admin');
Route::get('/categories', [categoryController::class, 'index']);
Route::get('/show-category/{category:id}',[categoryController::class, 'showCategory']);

//Cart Conttoller
Route::POST('/addCart/{item:id}', [cartController::class, 'addCart'])->middleware('auth');
Route::get('/mycart', [cartController::class, 'myCart'])->middleware('auth');
Route::get('/deleteCart/{id}', [cartController::class, 'deleteCart'])->middleware('auth');
Route::get('/editCart/{id}', [cartController::class, 'editCart'])->middleware('auth');
Route::POST('/checkout', [cartController::class, 'checkout'])->middleware('auth');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use App\Http\Controllers\loginController;

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

Route::get('/login', [loginController::class, 'login']);

Route::get('/myitems', [itemController::class, 'index']);
Route::get('/create-item', [itemController::class, 'createItem']);
Route::POST('/store-item', [itemController::class, 'storeItem']);
Route::get('/show-item/{item:id}', [itemController::class, 'showItem']);
Route::DELETE('/delete-item/{item:id}', [itemController::class, 'delete']);
Route::get('/edit-item/{item:id}', [itemController::class, 'edit']);
Route::PATCH('/update-item/{item:id}', [itemController::class, 'update']);

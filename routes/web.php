<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\PhotoController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () { 
    return 'Hello World'; 
}); 
Route::get('/world', function () { 
    return 'World'; 
});
Route::get('/selamat', function () { 
    return 'Selamat Datang'; 
});
Route::get('/about', function () { 
    return '2341760143_Dipa Praja Pramono'; 
});
Route::get('/user/{name}', function ($name) { 
    return 'Nama saya '.$name; 
});
Route::get('/posts/{post}/comments/{comment}', function 
($postId, $commentId) { 
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId; 
}); 
Route::get('/articles/{id}', function($artId) {
    return 'Halaman Artikel ID Ke-'.$artId;
});

#Optional Parameter
Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});



#Praktikum 2
Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles/{id}', [ArticlesController::class, 'articles']);
Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only([ 
    'index', 'show' ]); 
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy']);


#Praktikum 3
Route::get('/greeting', function () { 
    return view('hello', ['name' => 'Mas Pram']); 
}); 
Route::get('/greeting', function () { 
    return view('blog.hello', ['name' => 'Mas Pram']); 
});
Route::get('/greeting', [WelcomeController::class, 'greeting']);
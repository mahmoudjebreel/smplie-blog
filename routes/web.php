<?php

use App\Models\Article;
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

Route::view('about','frontend.about')->name('about');
Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'showHome'])->name('frontend.home');
Route::get('/articles/{id}', [App\Http\Controllers\Frontend\FrontendController::class,'showArticleDetails'])->name('article');


\Illuminate\Support\Facades\Auth::routes([
    'register' => false

]);



Route::middleware('auth')->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('categories',\App\Http\Controllers\CategoryController::class);
    Route::resource('tags',\App\Http\Controllers\TagController::class);
    Route::resource('articles',\App\Http\Controllers\ArticleController::class);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ArticleController;
use App\Models\Category;
use App\Models\User;
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

Route::get('/admissionITX', [FormController::class, 'form']);
Route::post('/proses', [FormController::class, 'proses']);

Route::get("/myblog", [ArticleController::class, 'index']);

Route::get('/myblog/{article:slug}', [ArticleController::class, 'content']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('category',[
        'title' => "Article By Category : $category->name",
        'articles' => $category->articles,
        'category' => $category->name
    ]);
});

Route::get('/authors/{author:username}', function(User $author){
    return view('article',[
        'title' => 'Article by Author',
        'name' => $author->name,
        'email' => $author->email,
        'articles' => $author->articles,
    ]);
});

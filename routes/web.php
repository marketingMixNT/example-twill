<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('{slug}', [\App\Http\Controllers\PageDisplayController::class, 'show'])->name('frontend.page');


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {
    Route::get('/', [\App\Http\Controllers\PageDisplayController::class, 'home'])->name('frontend.home'); 
    
    Route::get('news', function () {
        return view('site.articles.index', [
            'articles' => Article::published()->orderBy('created_at', 'desc')->get(),
        ]);
    })->name('articles');
    
    Route::get('news/{article}', function (Article $article) { 
        return view('site.articles.show', [
            'article' => $article,
        ]);
    })->name('article');
     
    Route::get('{slug}', [\App\Http\Controllers\PageDisplayController::class, 'show'])->name('frontend.page');

});



// Route::group([
//     'prefix' => LaravelLocalization::setLocale(),
//     'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
// ], function () {
//    
// });

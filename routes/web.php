<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\CategoriesController;
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
/*
Route::get('/', function () {
    return view('comon');
});
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
        Route::get('/category/{slug}', [NewsController::class, 'categoryNews'])->name('categoryNews');
        Route::get('/{id}', [NewsController::class, 'newsOne'])->name('newsOne');
    });

Route::prefix('adminka')
    ->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('admin.index');
        Route::get('/page2', [AdminIndexController::class, 'page2'])->name('admin.page2');
        Route::get('/page3', [AdminIndexController::class, 'page3'])->name('admin.page3');
        Route::get('/addnews', function () {
            return view('admin.addnews');
        })->name('addnews');;
    });



Route::fallback(function () {
    return view('404');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/login', function () {
    return view('login');
})->name('login');;


 
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\EditNewsController as EditNewsController;
use App\Http\Controllers\Admin\EditCategoryController as EditCategoryController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
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
        Route::get('/category/{slug}', [CategoriesController::class, 'categoryNewsBySlug'])->name('categoryNews');
        Route::get('/{id}', [NewsController::class, 'newsOne'])->name('newsOne');
    });

Route::prefix('adminka')
    ->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('admin.index');
        Route::get('/page2', [AdminIndexController::class, 'page2'])->name('admin.page2');
        Route::get('/page3', [AdminIndexController::class, 'page3'])->name('admin.page3');
        Route::get('/list_news', [EditNewsController::class, 'listNews'])->name('admin.list_news');
        Route::post('/list_news', [EditNewsController::class, 'deleteNews'])->name('admin.delete_news');
        Route::get('/edit_news/{id}', [EditNewsController::class, 'editNews'])->name('admin.edit_news');
        Route::post('/edit_news', [EditNewsController::class, 'updateNews'])->name('admin.update_news');


        Route::get('/list_categories', [EditCategoryController::class, 'listCategories'])->name('admin.list_categories');
        Route::post('/list_categories', [EditCategoryController::class, 'deleteCategory'])->name('admin.delete_category');

        Route::get('/edit_category/{id}', [EditCategoryController::class, 'editCategory'])->name('admin.edit_category');
        Route::post('/edit_category', [EditCategoryController::class, 'updateCategory'])->name('admin.update_category');


        Route::get('/download/{id}', [AdminIndexController::class, 'download'])->name('admin.download');
        Route::match(['get','post'],'/create', [AdminIndexController::class, 'create'])->name('admin.create');

        Route::match(['get','post'],'/create_category', [AdminIndexController::class, 'createCategory'])->name('admin.create_category');

        /*Route::get('/addnews', function () {
            return view('admin.addnews');
        })->name('addnews');;*/
    });

Route::get('images/{filename}', function ($filename) {

    $path = storage_path('app\\public\\images\\' . $filename);

    if (!File::exists($path)) {
        abort(code: 404);
    }
   
    $file = File::get($path);
    $type = File::mimeType($path);
    

    $response = Response::make($file, status: 200);
    $response->header("Content-type", $type);

    return $response;
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

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\EditNewsController as EditNewsController;
use App\Http\Controllers\Admin\EditCategoryController as EditCategoryController;
use App\Http\Controllers\Admin\Users\UsersController as UsersController;
use App\Http\Controllers\Admin\ParserController as ParserController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\Sources\EditSourceController as EditSourceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Providers\ParserController as ProvidersParserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
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



Route::group([
    'prefix' => 'adminka',
    'middleware' => ['is_admin']
],function () {
    Route::get('/', [AdminIndexController::class, 'index'])->name('admin.index');
    Route::get('/page2', [AdminIndexController::class, 'page2'])->name('admin.page2');
    Route::get('/page3', [AdminIndexController::class, 'page3'])->name('admin.page3');
    Route::get('/parser', [ParserController::class, 'index'])->name('parser.index');
    Route::post('/parser', [ParserController::class, 'parser'])->name('parser.start');
    Route::resource('news', EditNewsController::class)->only(['index', 'destroy', 'update', 'edit', 'create']);
    Route::resource('categories', EditCategoryController::class)->only(['index', 'create', 'update', 'destroy', 'store']);
    Route::get('/download/{id}', [AdminIndexController::class, 'download'])->name('admin.download');
    Route::resource('users', UsersController::class)->only(['index', 'destroy', 'edit', 'update', 'create' ]);
    Route::resource('sources', EditSourceController::class)->only(['index', 'destroy', 'edit', 'update', 'create' ]); 
});


/*Route::get('/auth/vk/responce',[LoginController::class, 'responseVK'])->name('vkresponce');
Route::get('/auth/vk',[LoginController::class, 'loginVK'])->name('vklogin');*/

Route::group([
    'prefix' => 'auth',
    'middleware' => ['guest']
],function () {
    Route::get('/vk/responce',[LoginController::class, 'responseVK'])->name('vkresponce');
    Route::get('/vk',[LoginController::class, 'loginVK'])->name('vklogin');
    Route::get('/ya/responce',[LoginController::class, 'responseYA'])->name('yaresponce');
    Route::get('/ya',[LoginController::class, 'loginYA'])->name('yalogin');
});



Route::group([
    'prefix' => 'account',
    'middleware' => ['auth']
],function () {
   // Route::get('/', AccountController::class)->name('account');
    Route::get('/', [AccountController::class, 'index'])->name('account.index');
    Route::post('/', [AccountController::class, 'update'])->name('account.update');
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

/*
Route::get('/login', function () {
    return view('login');
})->name('login');;
*/

 
// Auth::routes();
 Auth::routes(['register' => false]);
 

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

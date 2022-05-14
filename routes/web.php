<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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

Route::group(['middleware' => ['auth']], function () {


    Route::get('/', [WebController::class, 'indexPage'])
        ->name('indexPage');

    Route::get('/home', [WebController::class, 'indexPage'])
        ->name('indexPage');

    Route::get('/about', [WebController::class, 'aboutPage'])
        ->name('aboutPage');

    Route::prefix('category')->group(function () {
        Route::get('/{category_id}', [CategoryController::class, 'category'])
            ->name('categoryPage')
            ->whereNumber('category_id');
    });

    Route::prefix('good')->group(function () {
        Route::get('/{good_id}', [GoodController::class, 'goodPage'])
            ->name('goodPage')
            ->whereNumber('good_id');
    });

    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'news'])->name('newsListPage');
        Route::get('/{news_id}', [NewsController::class, 'newsPage'])
            ->name('newsPage')
            ->whereNumber('news_id');
    });

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'cartPage'])
            ->name('cartPage');

        Route::post('/make-order', [OrderController::class, 'makeOrder']);
    });


    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'orders'])
            ->name('ordersListPage');

        Route::get('/{order_id}', [OrderController::class, 'orderPage'])
            ->name('orderPage')
            ->whereNumber('order_id');
    });


    Route::group(['middleware' => ['auth', 'roleadmin']], function () {

        Route::prefix('settings')->group(function () {
            Route::post('/', [SettingsController::class, 'saveSettings'])
                ->name('saveAdminSettings');

            Route::get('/', [SettingsController::class, 'adminSettings'])
                ->name('adminSettings');
        });

        Route::prefix('category')->group(function () {
            Route::get('/new', [CategoryController::class, 'adminCategory'])
                ->name('adminCategory');

            Route::get('/{category_id}/edit', [CategoryController::class, 'adminCategory'])
                ->name('adminCategory')
                ->whereNumber('category_id');

            Route::post('/{category_id}/edit', [CategoryController::class, 'saveAdminCategory'])
                ->name('saveAdminCategory')
                ->whereNumber('category_id');

            Route::get('/{category_id}/add-good', [GoodController::class, 'adminAddGood'])
                ->name('adminAddGood')
                ->whereNumber('category_id');

            Route::get('/{category_id}/delete', [CategoryController::class, 'adminDeleteCategory'])
                ->name('adminDeleteCategory')
                ->whereNumber('category_id');
        });

        Route::prefix('good')->group(function () {
            Route::get('/{good_id}/edit', [GoodController::class, 'adminEditGood'])
                ->name('adminEditGood')
                ->whereNumber('good_id');

            Route::get('/{good_id}/delete', [GoodController::class, 'adminDeleteGood'])
                ->name('adminDeleteGood')
                ->whereNumber('good_id');

            Route::post('/{good_id}', [GoodController::class, 'saveAdminGood'])
                ->name('saveAdminGood')
                ->whereNumber('good_id');
        });
    });

});


Route::get('/logout', function () {
    Auth::logout();
    return Redirect::route('login');
});

Fortify::loginView(function () {
    return view('auth.login');
});

Fortify::registerView(function () {
    return view('auth.register');
});

<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Public;
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

// Route::get('welcome', function () {
//     return view('welcome');
// });

// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });

/* 
| Public
*/
Route::get('/', [Public\IndexController::class, "index"])->name('home');
Route::get('/detail/{id}', [Public\DetailController::class, "detail"])->name('detail');

/*
| admin
| ---------
| middleware : check login
| admin.
*/
Route::name('admin.')
->prefix('/admin')
->middleware('check_login')
->group(function() {

    /*
    | dashboard
    | ----------------
    | admin.dashbord.
    */
    Route::get('/dashboard', [Admin\Dashboard\IndexController::class, 'index'])->name('dashboard');

    /*
    | product
    | ----------------
    | admin.product
    */
    Route::name('product.')
    ->prefix('/product')
    ->group(function() {
        /*
        | create
        | ----------------
        | admin.product.create.
        */
        Route::name('create.')
        ->prefix('/create')
        ->controller(Admin\Product\CreateController::class)
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::post('/save', 'save')->name('save');
        });

        /*
        | delete
        | ----------------
        | admin.product.delete.
        */
        Route::post("/delete",[Admin\Product\DeleteController::class,"delete"])->name('delete'); 

        /*
        | update
        | ----------------
        | admin.product.update.
        */ 
        Route::name('update.')
        ->prefix('/update')
        ->controller(Admin\Product\UpdateController::class)
        ->group(function() {
            Route::get("/{id}","index")->name('index');
            Route::post("/save","save")->name('save');
        });

        /*
        | detail
        | ----------------
        | admin.detail.
        */
        Route::get('/detail/{id}', [Admin\Product\DetailController::class, 'detail'])->name('detail');

    });

    /*
    | profile
    | ----------------
    | admin.profile.
    */
    Route::name('profile.')
    ->prefix('/profile')
    ->controller(Admin\Profile\IndexController::class)
    ->group(function() {
        Route::get("/","index")->name('index');
        Route::post("/save","save")->name('save');
    });
});

/*
| Auth
| ---------
| auth.
*/
Route::name('auth.')
->prefix('/auth')->group(function() {

    /*
    | login
    | ----------------
    | auth.login.
    */
    Route::name('login.')
    ->prefix('/login')
    ->controller(Admin\Auth\LoginController::class)
    ->group(function() {
        Route::get("/","login")->name('index');
        Route::post("/save","save")->name('save');
    });
    /*
    | register
    | ----------------
    | auth.register.
    */
    Route::name('register.')
    ->prefix('/register')
    ->controller(Admin\Auth\RegisterController::class)
    ->group(function() {
        Route::get("/","register")->name('index');
        Route::post("/save","save")->name('save');
    });

    /*
    | logout
    | ----------------
    | auth.logout
    */
    Route::post("/logout",[Admin\Auth\LogoutController::class,"logout"])->name('logout')->middleware('check_login'); 
});









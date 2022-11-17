<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


Route::get('/login', [UserController::class, 'viewLogin'])->name('login');
Route::post('handdle-login', [UserController::class, 'login'])->name('handdle-login');


Route::get('register', [UserController::class, 'viewRegister'])->name('viewRegister');
Route::post('handdle-register', [UserController::class, 'register'])->name('handdle-register');


Route::middleware(['auth','revalidate'])->group(function () {
    Route::get('dashboard', function (){ return view('dashboard');})->name('dashboard.home');

    Route::get('master', function (){ return view('master');})->name('master');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');

    Route::group(['prefix'=>'categorys'],function(){
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/show/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes');
        Route::get('/trash', [CategoryController::class, 'trash'])->name('category.trash');
        Route::put('/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete');
    });

    Route::group(['prefix'=>'products'],function(){
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

        Route::put('/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
        Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
        Route::put('/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');

    });
    Route::group(['prefix'=>'users'],function(){
        Route::get('/',[UserController::class,'index'])->name('user.index');
        Route::get('/create',[UserController::class,'create'])->name('user.create');
        Route::post('/store',[UserController::class,'store'])->name('user.store');
        Route::get('/show/{id}',[UserController::class,'show'])->name('user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/editpass/{id}', [UserController::class, 'editpass'])->name('user.editpass');
        Route::put('/updatepass/{id}', [UserController::class, 'updatepass'])->name('user.updatepass');




    });
});

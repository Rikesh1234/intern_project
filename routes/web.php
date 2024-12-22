<?php

use App\Models\SEO;

use App\Models\postModel;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\SEOController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\PagesController;
use App\Http\Controllers\backend\AuthorController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\PermissionController;


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



Auth::routes();

Route::get('/cms/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::middleware(['auth'])->prefix('cms/post')->group(function () {

Route::get('/', [PostController::class, 'index'])->name('cms.post');
Route::get('/create', [PostController::class, 'create'])->name('cms.post.create');
Route::post('/',[PostController::class,'store'])->name('cms.post.store');
Route::get('/{id}/edit',[PostController::class,'edit'])->name('cms.post.edit');
Route::put('/{id}',[PostController::class,'update'])->name('cms.post.update');
Route::delete('/{id}', [PostController::class, 'destroy'])->name('cms.post.destroy');
Route::patch('/update-status/{id}/{status}', [PostController::class, 'updateStatus'])->name('cms.post.updateStatus');
});

Route::middleware(['auth'])->prefix('cms/author')->group(function(){
    Route::get('/',[AuthorController::class,'index'])->name('cms.author');
    Route::get('/create',[AuthorController::class,'create'])->name('cms.author.create');
    Route::post('/',[AuthorController::class,'store'])->name('cms.author.store');
    Route::get('/{author}/edit',[AuthorController::class,'edit'])->name('cms.author.edit');
    Route::put('/{id}',[AuthorController::class,'update'])->name('cms.author.update');
    Route::delete('/{id}', [AuthorController::class, 'destroy'])->name('cms.author.destroy');
    Route::patch('/update-status/{id}/{status}', [AuthorController::class, 'updateStatus'])->name('cms.author.updateStatus');
});

Route::middleware(['auth'])->prefix('cms/categories')->group(function () {
    Route::get('/',[CategoriesController::class,'index'])->name('cms.categories');
    Route::get('/create',[CategoriesController::class,'create'])->name('cms.categories.create');
    Route::post('/',[CategoriesController::class,'store'])->name('cms.categories.store');
    Route::get('/{categories}/edit',[CategoriesController::class,'edit'])->name('cms.categories.edit');
    Route::put('/{id}',[CategoriesController::class,'update'])->name('cms.categories.update');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('cms.categories.destroy');
    Route::patch('/update-status/{id}/{status}', [CategoriesController::class, 'updateStatus'])->name('cms.categories.updateStatus');
});

Route::middleware(['auth'])->prefix('cms/pages')->group(function () {
    Route::get('/',[PagesController::class,'index'])->name('cms.pages');
    Route::post('/',[PagesController::class,'store'])->name('cms.page.store');
    Route::get('/latest',[PagesController::class,'getLatestData'])->name('cms.page.latest');
    Route::get('/{pageId}',[PagesController::class,'edit'])->name('cms.page.edit');
    Route::patch('/{pageId}',[PagesController::class,'update'])->name('cms.page.update');
    Route::delete('/{id}', [PagesController::class, 'destroy'])->name('cms.page.destroy');
    Route::patch('/update-status/{id}/{status}', [PagesController::class, 'updateStatus'])->name('cms.page.updateStatus');
});

Route::middleware(['auth'])->prefix('cms/user')->group(function () {
    Route::get('/',[UserController::class,'index'])->name('cms.user');
    Route::get('/create',[UserController::class,'create'])->name('cms.user.create');
    Route::post('/',[UserController::class,'store'])->name('cms.user.store');
    Route::get('/{id}/edit',[UserController::class,'edit'])->name('cms.user.edit');
    Route::put('/{id}',[UserController::class,'update'])->name('cms.user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('cms.user.destroy');
    Route::patch('/update-status/{id}/{status}', [UserController::class, 'updateStatus'])->name('cms.user.updateStatus');
});

Route::middleware(['auth'])->prefix('cms/permission')->group(function () {
    Route::get('/',[PermissionController::class,'index'])->name('cms.permission');
});

Route::middleware(['auth'])->prefix('cms/role')->group(function () {
    Route::get('/',[RoleController::class,'index'])->name('cms.role');
    Route::get('/create',[RoleController::class,'create'])->name('cms.role.create');
    Route::post('/',[RoleController::class,'store'])->name('cms.role.store');
    Route::get('/{id}/edit',[RoleController::class,'edit'])->name('cms.role.edit');
    Route::put('/{id}',[RoleController::class,'update'])->name('cms.role.update');
    Route::delete('/{id}', [RoleController::class, 'destroy'])->name('cms.role.destroy');
});

Route::middleware(['auth'])->prefix('cms/SEO')->group(function(){
    Route::get('/',[SEOController::class,'index'])->name('cms.SEO');
    Route::get('/create',[SEOController::class,'create'])->name('cms.SEO.create');
    Route::post('/',[SEOController::class,'store'])->name('cms.SEO.store');
    Route::put('/{id}',[SEOController::class,'update'])->name('cms.SEO.update');
    Route::delete('/{id}', [SEOController::class, 'destroy'])->name('cms.SEO.destroy');
    Route::patch('/update-data/{id}', [SEOController::class, 'updateData'])->name('cms.SEO.updateData');
});

Route::group(['as'=> 'frontend.'], function(){
    Route::get('/',[App\Http\Controllers\frontend\HomeController::class,'index'])->name('index');
    Route::get('/latest',[App\Http\Controllers\frontend\PostController::class,'latest'])->name('latest');
    Route::get('/{categories_slug}',[App\Http\Controllers\frontend\PostController::class,'index'])->name('list');
        Route::get('author/{id}', [App\Http\Controllers\frontend\PostController::class, 'authorList'])->name('author.list');
        Route::get('detail/{id}',[App\Http\Controllers\frontend\PostController::Class,'postDesp'])->name('post.desp');
        Route::get('pages/{page_slug}',[App\Http\Controllers\frontend\PostController::Class,'pages'])->name('page');
        Route::get('page/search/{search_word}',[App\Http\Controllers\frontend\PostController::Class,'search'])->name('search');
    });


Route::view('dashboard','Admin');

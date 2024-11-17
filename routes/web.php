<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Jobs\KeyGenerateJob;
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

Route::get('/', function () {
    toast("Welcome to FAQ Platform", 'success');
    return view('welcome');
})->name('home');

Route::get('/login', [PageController::class , 'login'])->name('login');

Route::get('/host-join/{id}', [PageController::class , 'host_join'])->name('host_join');
Route::get('/guest-join/{id}', [PageController::class , 'guest_join'])->name('guest_join');
Route::get('/support', [PageController::class , 'support'])->name('support');
Route::get('/docs', [PageController::class , 'docs'])->name('docs');
Route::get('/contact', [PageController::class , 'contact'])->name('contact');
Route::get('/search_all', [PageController::class , 'Search_all'])->name('search_all');


//REQUESTS
Route::post('/feedback', [PageController::class , 'feedback'])->name('feedback');
Route::post('/post-login', [PageController::class , 'AccountLogin'])->name('post_login');
Route::post('/send_contact', [PageController::class , 'send_contact'])->name('send_contact');
Route::post('/send_support', [PageController::class , 'send_meeting'])->name('send_meeting');

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/dashboard', [PageController::class, 'Dashboard'])->name('dashboard');
    Route::get('/all_users', [PageController::class, 'AllUsers'])->name('all_users');
    Route::get('/all_categories', [PageController::class, 'ArticleCategories'])->name('all_categories');
    Route::get('/account/{id}', [PageController::class, 'Account'])->name('account');
    Route::get('/articles/{id}', [PageController::class, 'Articles'])->name('articles');
    Route::get('/edit-article/{id}', [PageController::class, 'EditArticle'])->name('edit_article');
    Route::get('/search', [PageController::class, 'Search'])->name('search');
    Route::get('/logout', [PageController::class, 'Logout'])->name('logout');
    Route::get('/departments', [PageController::class, 'Department'])->name('departments');
    Route::get('/requests', [PageController::class, 'Requests'])->name('requests');


//REQUESTS
    Route::post('/create_user', [AdminController::class, 'CreateUser'])->name('create_user');
    Route::post('/update_user', [AdminController::class, 'UpdateUser'])->name('update_user');
    Route::get('/delete_user/{id}', [AdminController::class, 'DeleteUser'])->name('delete_user');
    Route::post('upload-image', [AdminController::class, 'uploadImage'])->name('uploadImage');

    Route::post('/create_category', [AdminController::class, 'CreateCategory'])->name('create_category');
    Route::post('/update_category', [AdminController::class, 'UpdateCategory'])->name('update_category');
    Route::get('/delete_category/{id}', [AdminController::class, 'DeleteCategory'])->name('delete_category');

    Route::post('/create_department', [AdminController::class, 'CreateDepartment'])->name('create_department');
    Route::post('/update_department', [AdminController::class, 'UpdateDepartment'])->name('update_department');
    Route::get('/delete_department/{id}', [AdminController::class, 'DeleteDepartment'])->name('delete_department');


    Route::post('/update_access', [AdminController::class, 'UpdateAccess'])->name('update_access');
    Route::get('/delete_access/{id}', [AdminController::class, 'DeleteAccess'])->name('delete_access');



     Route::post('/create_article', [AdminController::class, 'CreateArticle'])->name('create_article');
    Route::post('/update_article', [AdminController::class, 'UpdateArticle'])->name('update_article');
    Route::get('/delete_article/{id}', [AdminController::class, 'DeleteArticle'])->name('delete_article');
    Route::post('/request_access/{id}', [AdminController::class, 'RequestForAccess'])->name('request_access');



});


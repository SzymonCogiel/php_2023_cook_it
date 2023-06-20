<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/comments', CommentController::class);
Route::resource('/books', BookController::class)->middleware(['auth']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin/dashboard', 'AdminController@dashboard');
    Route::get('/settings', 'AdminController@settings');
});

Route::match(['get','post'], '/admin', [AdminController::class, 'login']);

Route::get('/', [FrontController::class, 'front']);

Route::any('/signup', [UsersController::class, 'signup']);

Route::get('/check-username', [UsersController::class, 'checkUsername']);

Route::get('/check-email', [UsersController::class, 'checkEmail']);

Route::any('/signin', [UsersController::class, 'signin']);

Route::any('/phase/2', [UsersController::class, 'phase2']);

Route::get('/inreview', [UsersController::class, 'interview']);

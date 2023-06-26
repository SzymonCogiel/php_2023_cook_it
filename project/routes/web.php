<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;


Route::match(['get','post'], '/admin', [AdminController::class, 'login']);

Route::get('/', [FrontController::class, 'front']);

Route::any('/signup', [UsersController::class, 'signup'])->name('register');

Route::get('/check-username', [UsersController::class, 'checkUsername']);

Route::get('/check-email', [UsersController::class, 'checkEmail']);

Route::any('/signin', [UsersController::class, 'signin'])->name('signin');

Route::get('/profile', [UsersController::class, 'profile'])->name('profile');

Route::get('/challenge', [ChallengeController::class, 'indexChallange']);
Route::post('/sendChallange', [ChallengeController::class, 'sendChallange']);

Route::post('/sendPhoto', [UsersController::class, 'sendPhoto']);



Route::get('/message', [ChatController::class, 'index']);
Route::post('/send', [ChatController::class, 'sendMessage']);


Route::get('/received', [ChatController::class, 'showReceivedMessages'])->name('received-messages');
Route::get('/sended', [ChatController::class, 'indexSend'])->name('sended');

Route::get('/search', [ChallengeController::class, 'search'])->name('search');
Route::post('/sendId', [ChallengeController::class, 'sendID']);

Route::post('/sendReview', [ChallengeController::class, 'sendReview']);


Route::group(['middleware'=>['auth']], function () {

    Route::any('/phase/2', [UsersController::class, 'phase2'])->name('phase3');

    Route::get('/inreview', [UsersController::class, 'inreview']);

    //gigRoute::any('/phase/3', [UsersController::class, 'phase3']);

    Route::post('/photoupload', [UsersController::class, 'postphoto']);


    Route::get('/delete-photo/{photo}', [UsersController::class, 'deletePhoto']);

    Route::match(['get', 'post'], '/contact/{username}', [UsersController::class, 'contactUser']);

    Route::get('/shooted-messages', [UsersController::class, 'shootedMessages']);

    //Route::get('/replies', [UsersController::class, 'replies']);

    Route::get('/delete-reply/{id}', [UsersController::class, 'deleteReply']);

    Route::post('/update-reply', [UsersController::class, 'updateReply']);
});

Route::get('check-username', [UsersController::class, 'checkUsername']);

//Route::any('/profile/{username}', [UsersController::class, 'viewProfile']);

Route::get('/default-photo/{photo}', [UsersController::class, 'defaultPhoto']);

Route::get('/logout', [UsersController::class, 'logout']);

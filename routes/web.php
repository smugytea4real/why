<?php

use App\Http\Controllers\Backend\PostVoteController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Backend\CommunityPostController;
use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Frontend\CommunityController as FrontendCommunityController;
use App\Http\Controllers\Frontend\PostCommentController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/',[WelcomeController::class, 'Welcome'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/r/{slug}', [FrontendCommunityController::class, 'show'])->name('frontend.communities.show');
Route::get('/r/{community_slug}/posts/{post:slug}', [PostController::class, 'show'])->name('frontend.communities.posts.show');
Route::post('/r/{community_slug}/posts/{post:slug}/comments', [PostCommentController::class, 'store'])->name('frontend.communities.posts.comments');



Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/dashboard/communities', CommunityController::class);
    Route::resource('/dashboard/communities.posts', CommunityPostController::class);

    Route::post('/posts/{post:slug}/upVote',[PostVoteController::class, 'upVote'])->name('posts.upVote');
    Route::post('/posts/{post:slug}/downVote',[PostVoteController::class, 'downVote'])->name('posts.downVote');
});


require __DIR__ . '/auth.php';


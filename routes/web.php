<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'Login'])->name('login');

Route::get('/register', [UserController::class, 'showRegister'])->name('register.show');
Route::post('/register', [UserController::class, 'Register'])->name('register');

Route::get('/set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('locale.set');
Route::get('/search', [UserController::class, 'search'])->name('user.search');

Route::middleware(['CheckLogin'])->group(function(){
    Route::prefix('/user')->group(function () {
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::get('/setting', [UserController::class, 'setting'])->name('user.setting');
        Route::get('/setting/visible', [UserController::class, 'visible'])->name('user.visible');
        Route::get('/setting/invisible', [UserController::class, 'invisible'])->name('user.invisible');
    
        Route::get('/coin', [UserController::class, 'showCoin'])->name('coin.show');
        Route::get('/coin/add', [UserController::class, 'addCoin'])->name('coin.add');
            
        Route::get('/wishlist', [FriendController::class, 'showWishlist'])->name('wish.show');
        Route::post('/wishlist/{id}', [FriendController::class, 'addWishlist'])->name('wish.add');
        Route::get('/request', [FriendController::class, 'showRequest'])->name('request.show');
    
        Route::get('/message/{id}', [MessageController::class, 'index'])->name('message.index');
        Route::post('/message/{id}', [MessageController::class, 'store'])->name('message.store');
    
        Route::get('/avatar', [AvatarController::class, 'index'])->name('avatar.index');
        Route::get('/avatar/create', [AvatarController::class, 'create'])->name('avatar.create');
        Route::post('/avatar', [AvatarController::class, 'store'])->name('avatar.store');
        
        Route::get('/my-avatars', [AvatarController::class, 'showAvatars'])->name('user.avatar');
        Route::get('/avatar/buy/{id}', [AvatarController::class, 'buy'])->name('avatar.buy');
        Route::get('/avatar/set/{id}', [AvatarController::class, 'set'])->name('avatar.set');
        Route::get('/avatar/receive/{id}', [AvatarController::class, 'receive'])->name('avatar.receive');
    
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
    
    Route::get('/payment/{price}', [PaymentController::class, 'showPayment'])->name('payment.show');
    Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');
    Route::get('/payment-overpay', [PaymentController::class, 'overpay'])->name('payment.overpay');
});
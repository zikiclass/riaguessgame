<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Validator;
use App\Http\Controllers\AdminController;
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
    return view('index');
});

//Route::group(['middleware' => ['auth', 'auth.validate', 'prevent-back']], function(){
    Route::get('login', [Validator::class ,'login_fnc'])->name('login');
    Route::get('signup', [Validator::class, 'signup_fnc'])->name('signup');
    Route::get('forgot', [Validator::class, 'forgot_fnc'])->name('forgot');
    Route::get('reset', [Validator::class, 'reset_fnc'])->name('reset');
    Route::post('save_user', [Validator::class, 'save_user']);
    Route::post('user_login', [Validator::class, 'user_login']);
    Route::get('/logout', [Validator::class, 'logout'])->name('logout');

    Route::get('about', [Validator::class, 'about_fnc'])->name('about');
    Route::get('blog', [Validator::class, 'blog_fnc'])->name('blog');
    Route::get('contact', [Validator::class, 'contact_fnc'])->name('contact');

//});

Route::group(['middleware' => ['auth', 'auth.user','prevent-back']], function(){
Route::get('gamearena', [Validator::class, 'gamearena_fnc'])->name('gamearena');
Route::get('gamesettings', [Validator::class, 'gamesettings_fnc'])->name('gamesettings');
Route::get('become_player', [Validator::class, 'become_player_fnc'])->name('become_player');
Route::get('startGame/{id}', [Validator::class, 'startGame_fnc'])->name('startGame');
Route::get('playgame/{id}', [Validator::class, 'playgame_fnc'])->name('playgame');
Route::get('updateTime/{minutes}/{seconds}', [Validator::class, 'updateTime_fnc'])->name('updateTime');
Route::get('playagain', [Validator::class, 'playagain_fnc'])->name('playagain');
Route::get('playStart', [Validator::class, 'playStart_fnc'])->name('playStart');
Route::get('playPause', [Validator::class, 'playPause_fnc'])->name('playPause');
Route::get('playResume', [Validator::class, 'playResume_fnc'])->name('playResume');
});

Route::group(['middleware' => ['auth', 'auth.admin', 'prevent-back']], function(){
Route::get('admin', [AdminController::class, 'admin_fnc'])->name('admin');
Route::get('gametitle', [AdminController::class, 'gametitle_fnc'])->name('gametitle');
Route::get('viewgames', [AdminController::class, 'viewgames_fnc'])->name('viewgames');
Route::get('players', [AdminController::class, 'players_fnc'])->name('players');
Route::get('gametitledetails/{id}', [AdminController::class, 'gametitledetails_fnc'])->name('gametitledetails');
Route::post('gametitleupdate', [AdminController::class, 'gametitleupdate_fnc'])->name('gametitleupdate');
Route::get('down/{id}', [AdminController::class, 'down_fnc'])->name('down');
Route::get('up/{id}', [AdminController::class, 'up_fnc'])->name('up');
});
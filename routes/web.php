<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MocomiController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\showUsersController;
use App\Http\Controllers\ValidatesController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Auth\RegisterController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Models\Like;
use App\Models\Mocomi;
use Illuminate\Support\Facades\Auth;


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

Route::get('/members', [MocomiController::class, 'member']);

//Route::get('/', http://localhost/mocomi/public/ にアクセスしたらmocomiのファイルの中のtopという名前のビューを表示
Route::get('/', [MocomiController::class, 'top']);

/* nameの('○○')をコードしたらそれぞれの指定のページに飛ばす */
// TOPページ
Route::get('/top', [MocomiController::class, 'top'])->name('top');
Route::post('/top', [MocomiController::class, 'top'])->name('top');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ログインページ
Route::get('/login', [MocomiController::class, 'login'])->name('login');

// サインアップページ
Route::get('/signup', [MocomiController::class, 'signup'])->name('signup');

Route::post('/signup', [MocomiController::class, 'signup'])->name('signup');

// 少年・青年コミックTOPページ
Route::get('/men', [MocomiController::class, 'men'])->name('men');

// 少女・女性コミックTOPページ
Route::get('/women', [MocomiController::class, 'women'])->name('women');

// コミック巻ごとのTOPページ
Route::get('/comic_top/{id}', [MocomiController::class, 'comic_top'])->name('comic_top');
// いいねボタン
Route::post('/like/{postId}',[MocomiController::class,'like'])->name('like');
Route::post('/unlike/{postId}',[MocomiController::class,'unlike'])->name('unlike');

// 検索結果
Route::get('/search_result', [MocomiController::class, 'search_result'])->name('search_result');

// バリデーションかDB挿入かのどっちかしかできない。。。
// Route::post('/insert', 'App\Http\Controllers\ValidatesController@signupVal')->name('signupVal_create');
// Route::get('/insert', 'App\Http\Controllers\ValidatesController@signupVal')->name('signupVal_create');

// ↓をコメントアウトするとバリデーションはできるけどDB挿入ができなくなる
// Route::post('/insert', 'App\Http\Controllers\showUsersController@create')->name('signupVal_create');
// Route::get('/insert', 'App\Http\Controllers\showUsersController@create')->name('signupVal_create');

Route::post('/login_email', 'App\Http\Controllers\LoginController@login_email')->name('login_email');

// Route::post('/register_google', [RegisterController::class, 'register_google'])->name('register_google');

Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Auth::routes();

Route::post('/like', [MocomiController::class, 'like'])->name('like');


//一般ユーザー以上
Route::group(['middleware' => ['auth', 'can:user'], ['auth', 'can:post-user'], ['auth', 'can:admin']], function () {
    //ここにルートを記述
    // マイページ と 必要なDB情報取得
    Route::get('/mypage', [MocomiController::class, 'mypage'])->name('mypage');
    // Route::post('/mypage', [MocomiController::class, 'mypage'])->name('mypage');

    // アカウント情報編集ページ
    Route::get('/account_edit', [MocomiController::class, 'account_edit'])->name('account_edit');
    // Route::post('/account_edit', [MocomiController::class, 'account_edit'])->name('account_edit');

    // アカウント情報編集確認ページ
    // Route::get('/account_edit_confirmation', [MocomiController::class, 'account_edit_confirmation'])->name('account_edit_confirmation');
    Route::post('/account_edit_confirmation/{id}', [MocomiController::class, 'account_edit_confirmation'])->name('account_edit_confirmation');

    // アカウント情報編集完了ページ
    Route::post('/account_edit_complete/{id}', [MocomiController::class, 'account_edit_complete'])->name('account_edit_complete');
    Route::get('/account_edit_complete/{id}', [MocomiController::class, 'account_edit_complete'])->name('account_edit_complete');

    // アカウント削除確認ページ
    Route::get('/account_delete_confirmation', [MocomiController::class, 'account_delete_confirmation'])->name('account_delete_confirmation');

    // アカウント削除完了ページ
    Route::post('/account_delete_complete/{id}', [MocomiController::class, 'account_delete_complete'])->name('account_delete_complete');
    Route::get('/account_delete_complete/{id}', [MocomiController::class, 'account_delete_complete'])->name('account_delete_complete');

    // 本棚ページ
    Route::get('/bookshelf', [MocomiController::class, 'bookshelf'])->name('bookshelf');

    //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
    Route::post('ajaxlike', [MocomiController::class, 'ajaxlike'])->name('ajaxlike');

    // お気に入り一覧ページ
    Route::get('/favorite', [MocomiController::class, 'favorite'])->name('favorite');

    // 購入履歴ページ
    Route::get('/purchase_history', [MocomiController::class, 'purchase_history'])->name('purchase_history');

    // 閲覧履歴ページ
    Route::get('/browsing_history', [MocomiController::class, 'browsing_history'])->name('browsing_history');

    // カートページ
    Route::get('/cart', [MocomiController::class, 'cart'])->name('cart');
    Route::post('/cart', [MocomiController::class, 'cart'])->name('cart');

    // 購入手続きページ
    Route::get('/purchase', [MocomiController::class, 'purchase'])->name('purchase');
    Route::post('/purchase', [MocomiController::class, 'purchase'])->name('purchase');

    // 購入完了ページ
    Route::get('/purchase_complete', [MocomiController::class, 'purchase_complete'])->name('purchase_complete');
    Route::post('/purchase_complete', [MocomiController::class, 'purchase_complete'])->name('purchase_complete');

    // コミック閲覧ページ
    Route::get('/comic_browse/{id}', [MocomiController::class, 'comic_browse'])->name('comic_browse');

    // コミック巻ごとのコメントや評価ページ
    Route::get('/comic_evaluation', [MocomiController::class, 'comic_evaluation'])->name('comic_evaluation');
});


// 投稿ユーザー以上
Route::group(['middleware' => ['auth', 'can:post-user'], ['auth', 'can:admin']], function () {
    //ここにルートを記述

    // アップロードページ
    Route::get('/upload', [MocomiController::class, 'upload'])->name('upload');

    //データの削除
    Route::get('/book_delete/{id}', [MocomiController::class, 'book_delete'])->name('book_delete');

    // アップロード確認ページ
    Route::get('/upload_confirmation', [MocomiController::class, 'upload_confirmation'])->name('upload_confirmation');
    Route::post('/upload_confirmation', [MocomiController::class, 'upload_confirmation'])->name('upload_confirmation');

    // アップロード完了ページ
    Route::get('/upload_complete', [MocomiController::class, 'upload_complete'])->name('upload_complete');
});

// 管理者
Route::group(['middleware' =>  ['auth', 'can:admin']], function () {
    //ここにルートを記述

});



Route::view('/admin/login', 'admin/login');
Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\admin\LoginController::class, 'logout']);
Route::view('/admin/register', 'admin/register');
Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

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
    return view('review.index');
});

Route::get('/', function () {
    return view('review.admin');
});


Route::get('review/index', [ReviewController::class, 'layout'])->name('index');

Route::get('review/item', [ReviewController::class, 'index'])->name('item');

Route::get('review/admin', [ReviewController::class, 'layout_admin'])->name('admin');

Route::get('review/update', [ReviewController::class, 'admin'])->name('update');




Route::get('review/review', [ReviewController::class, 'review'])->name('review');

Route::post('review/review', [ReviewController::class, 'confirm'])->name('confirm');

Route::get('review/review_admin', [ReviewController::class, 'review_admin'])->name('review_admin');

Route::post('review/review_admin', [ReviewController::class, 'confirm_admin'])->name('confirm_admin');




//Route::post('review/review2', [ReviewController::class, 'review2'])->name('review2');

Route::get('review/update2/{id}', [ReviewController::class, 'update2'])->name('update2');

Route::get('review/form', [ReviewController::class, 'form'])->name('form');

Route::post('review/form', [ReviewController::class, 'item00'])->name('item00');

Route::post('review/delete/{id?}', [ReviewController::class,'delete'])-> name('delete');

Route::post('review/delete2/{id?}', [ReviewController::class,'delete2'])-> name('delete2');



Route::get('review/complete', [ReviewController::class, 'complete'])->name('completed');

Route::post('review/complete', [ReviewController::class, 'send'])->name('complete');
Route::get('review/complete', function () {
    return redirect()->route('form');
});

Route::post('/review', 'ReviewController@like')->name('reviews.like');


//テスト








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // ここに書かれたルートに未認証でアクセスすると、ログイン・登録後にちゃんと戻ってくれる
  });

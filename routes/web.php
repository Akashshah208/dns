<?php

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

/*Route::get('/', function () {
    return view('index', ['mxLookupData' => null, 'domain' => null, 'ip4' => null, 'ip6' => null]);
})->name('index');*/

Route::get('blacklist_check', function () {
    return view('blacklist-check');
})->name('blacklist_check');

/*Route::get('email_server_tester', function () {
    return view('email-server-tester');
})->name('email_server_tester');*/

Route::get('reverse_dns', function () {
    return view('reverse-dns');
})->name('reverse_dns');

/*Route::get('dns', function () {
    return view('dns');
})->name('dns');*/

Route::get('spf', function () {
    return view('spf');
})->name('spf');

Route::get('dmarc', function () {
    return view('dmarc');
})->name('dmarc');

Route::get('ssl', function () {
    return view('ssl');
})->name('ssl');

Route::get('bmi', function () {
    return view('bmi');
})->name('bmi');

Route::get('cname', function () {
    return view('cname');
})->name('cname');

/*Route::get('txt', function () {
    return view('txt');
})->name('txt');*/

Route::get('http', function () {
    return view('https');
})->name('http');

Route::get('http_s', function () {
    return view('https');
})->name('http_s');

Route::get('about', function () {
    return view('about');
})->name('about');

//Route::get('mxLookupData', [\App\Http\Controllers\LookupDataController::class, 'mxLookupData'])->name('mxLookupData');

Route::match(['get', 'post'], '/', [\App\Http\Controllers\LookupDataController::class, 'mxLookupData'])->name('index');
Route::match(['get', 'post'], 'email_server_tester', [\App\Http\Controllers\LookupDataController::class, 'emailServerTester'])->name('email_server_tester');
Route::match(['get', 'post'], 'dns', [\App\Http\Controllers\LookupDataController::class, 'dns'])->name('dns');
Route::match(['get', 'post'], 'cname', [\App\Http\Controllers\LookupDataController::class, 'cname'])->name('cname');
Route::match(['get', 'post'], 'txt', [\App\Http\Controllers\LookupDataController::class, 'txt'])->name('txt');

/* Login System */
Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {
    Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
    Route::post('doLogin', [\App\Http\Controllers\LoginController::class, 'doLogin'])->name('doLogin');
});

/* Admin */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::get('account', [\App\Http\Controllers\LoginController::class, 'account'])->name('admin.account');
    Route::post('accountUpdate', [\App\Http\Controllers\LoginController::class, 'accountUpdate'])->name('admin.accountUpdate');

    Route::get('blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('admin.blog');
    Route::get('addBlog', [\App\Http\Controllers\BlogController::class, 'addBlog'])->name('admin.addBlog');
    Route::post('storeBlog', [\App\Http\Controllers\BlogController::class, 'storeBlog'])->name('admin.storeBlog');


    Route::get('', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::post('addCategory', [App\Http\Controllers\AdminController::class, 'addCategory'])->name('admin.addCategory');

    Route::get('addAuthor', [App\Http\Controllers\AdminController::class, 'addAuthor'])->name('admin.addAuthor');
    Route::get('authorDelete/{id}', [App\Http\Controllers\AdminController::class, 'authorDelete'])->name('admin.authorDelete');
    Route::post('storeAuthor', [App\Http\Controllers\AdminController::class, 'storeAuthor'])->name('admin.storeAuthor');;
});

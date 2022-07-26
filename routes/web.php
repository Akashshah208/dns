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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('blacklist_check', function () {
    return view('blacklist-check');
})->name('blacklist_check');

Route::get('email_server_tester', function () {
    return view('email-server-tester');
})->name('email_server_tester');

Route::get('reverse_dns', function () {
    return view('reverse-dns');
})->name('reverse_dns');

Route::get('dns', function () {
    return view('dns');
})->name('dns');

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

Route::get('txt', function () {
    return view('txt');
})->name('txt');

Route::get('http', function () {
    return view('https');
})->name('http');

Route::get('http_s', function () {
    return view('https');
})->name('http_s');

Route::get('about', function () {
    return view('about');
})->name('about');

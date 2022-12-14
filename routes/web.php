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

Route::get('contact', function () {
    return view('contact_us');
})->name('contact');


/*Route::get('txt', function () {
    return view('txt');
})->name('txt');*/

Route::get('http', function () {
    return view('https');
})->name('http');

Route::get('http_s', function () {
    return view('https');
})->name('http_s');

/*Route::get('about', function () {
    return view('about');
})->name('about');*/

//Route::get('mxLookupData', [\App\Http\Controllers\LookupDataController::class, 'mxLookupData'])->name('mxLookupData');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\ContactUsMail($details));

    dd("Email is Sent.");
});


Route::match(['get', 'post'], '/', [\App\Http\Controllers\LookupDataController::class, 'mxLookupData'])->name('index');
Route::match(['get', 'post'], 'email_server_tester', [\App\Http\Controllers\LookupDataController::class, 'emailServerTester'])->name('email_server_tester');
Route::match(['get', 'post'], 'dns', [\App\Http\Controllers\LookupDataController::class, 'dns'])->name('dns');
Route::match(['get', 'post'], 'cname', [\App\Http\Controllers\LookupDataController::class, 'cname'])->name('cname');
Route::match(['get', 'post'], 'txt', [\App\Http\Controllers\LookupDataController::class, 'txt'])->name('txt');

Route::get('blog', [\App\Http\Controllers\Clint\BlogController::class, 'index'])->name('blog');
Route::get('blogDetails/{id}', [\App\Http\Controllers\Clint\BlogController::class, 'details'])->name('blogDetails');

Route::get('privacyPolicy', [App\Http\Controllers\AdminController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('services', [App\Http\Controllers\AdminController::class, 'services'])->name('services');
Route::get('about', [App\Http\Controllers\AboutController::class, 'about'])->name('about');

Route::post('storeContact', [\App\Http\Controllers\AdminController::class, 'storeContact'])->name('storeContact');


Route::post('postComment', [\App\Http\Controllers\CommentController::class, 'postComment'])->name('postComment');

Route::post('replyCommentPopup', [\App\Http\Controllers\CommentController::class, 'replyCommentPopup'])->name('replyCommentPopup');

Route::post('replyComment', [\App\Http\Controllers\CommentController::class, 'replyComment'])->name('replyComment');
Route::get('commentDelete/{id}', [App\Http\Controllers\CommentController::class, 'commentDelete'])->name('admin.commentDelete');


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
    Route::get('blogDetails/{id}', [\App\Http\Controllers\BlogController::class, 'details'])->name('admin.blogDetails');
    Route::get('addBlog', [\App\Http\Controllers\BlogController::class, 'addBlog'])->name('admin.addBlog');
    Route::post('storeBlog', [\App\Http\Controllers\BlogController::class, 'storeBlog'])->name('admin.storeBlog');
    Route::put('editBlog', [\App\Http\Controllers\BlogController::class, 'editBlog'])->name('admin.editBlog');
    Route::get('blogDelete/{id}', [App\Http\Controllers\BlogController::class, 'blogDelete'])->name('admin.blogDelete');


    Route::get('', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    Route::get('addAbout', [App\Http\Controllers\AboutController::class, 'addAbout'])->name('admin.addAbout');
    Route::post('storeAbout', [App\Http\Controllers\AboutController::class, 'storeAbout'])->name('admin.storeAbout');


    Route::post('storeFounder', [App\Http\Controllers\AboutController::class, 'storeFounder'])->name('admin.storeFounder');
    Route::get('founderDelete/{id}', [App\Http\Controllers\AboutController::class, 'founderDelete'])->name('admin.founderDelete');


    Route::get('categoryDelete/{id}', [App\Http\Controllers\AdminController::class, 'categoryDelete'])->name('admin.categoryDelete');


    Route::get('addCategory', [App\Http\Controllers\AdminController::class, 'addCategory'])->name('admin.addCategory');
    Route::post('storeCategory', [App\Http\Controllers\AdminController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::get('categoryDelete/{id}', [App\Http\Controllers\AdminController::class, 'categoryDelete'])->name('admin.categoryDelete');


    Route::get('addAuthor', [App\Http\Controllers\AdminController::class, 'addAuthor'])->name('admin.addAuthor');
    Route::get('authorDelete/{id}', [App\Http\Controllers\AdminController::class, 'authorDelete'])->name('admin.authorDelete');
    Route::post('storeAuthor', [App\Http\Controllers\AdminController::class, 'storeAuthor'])->name('admin.storeAuthor');

    Route::get('addPrivacyPolicy', [App\Http\Controllers\AdminController::class, 'addPrivacyPolicy'])->name('admin.addPrivacyPolicy');
    Route::post('storePrivacyPolicy', [App\Http\Controllers\AdminController::class, 'storePrivacyPolicy'])->name('admin.storePrivacyPolicy');
    Route::get('privacyPolicyDelete/{id}', [App\Http\Controllers\AdminController::class, 'privacyPolicyDelete'])->name('admin.privacyPolicyDelete');

    Route::get('addServices', [App\Http\Controllers\AdminController::class, 'addServices'])->name('admin.addServices');
    Route::post('storeServices', [App\Http\Controllers\AdminController::class, 'storeServices'])->name('admin.storeServices');
    Route::get('servicesDelete/{id}', [App\Http\Controllers\AdminController::class, 'servicesDelete'])->name('admin.servicesDelete');

    Route::get('contactUs', [App\Http\Controllers\AdminController::class, 'contactUs'])->name('admin.contactUs');
    Route::get('contactUsDelete/{id}', [App\Http\Controllers\AdminController::class, 'contactUsDelete'])->name('admin.contactUsDelete');
    Route::get('contactUsGeneratePdf', [App\Http\Controllers\AdminController::class, 'contactUsGeneratePdf'])->name('admin.contactUsGeneratePdf');


    Route::get('userData', [App\Http\Controllers\AdminController::class, 'userData'])->name('admin.userData');
    Route::get('userDataGeneratePdf', [App\Http\Controllers\AdminController::class, 'userDataGeneratePdf'])->name('admin.userDataGeneratePdf');
    Route::get('userDataGenerateExcel', [App\Http\Controllers\AdminController::class, 'userDataGenerateExcel'])->name('admin.userDataGenerateExcel');


});

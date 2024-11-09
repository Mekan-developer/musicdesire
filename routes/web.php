<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Livewire\TrackCatalog;
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
    return view('landing');
});
Route::get('/home ', function () {
    return view('landing');
});

Auth::routes();

Route::get('/language/{locale}', [App\Http\Controllers\HomeController::class, 'changeLocale']);
Route::get('/lang/{language}', [App\Http\Controllers\HomeController::class, 'lang']);
// Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'catalog']);
Route::get('/catalog', TrackCatalog::class);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/contacts', [App\Http\Controllers\HomeController::class, 'contacts']);
Route::get('/reviews', [App\Http\Controllers\HomeController::class, 'reviews']);
Route::get('/performance', [App\Http\Controllers\HomeController::class, 'performance']);
Route::get('/oferta', [App\Http\Controllers\HomeController::class, 'oferta']);
Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index']);
Route::get('/payment/result', [App\Http\Controllers\PaymentController::class, 'result'])->name('payment-result');
Route::get('/payment/fail', [App\Http\Controllers\PaymentController::class, 'fail'])->name('payment-fail');
Route::match(array('GET','POST'),'/payment/paypal/notification', [App\Http\Controllers\PaymentController::class, 'paypalNotification'])->name('payment-paypal-notification');
Route::match(array('GET','POST'),'/payment/yookassa/notification', [App\Http\Controllers\PaymentController::class, 'yookassaNotification'])->name('payment-yookassa-notification');
Route::match(array('GET','POST'),'/payment/prodamus/notification', [App\Http\Controllers\PaymentController::class, 'prodamusNotification'])->name('payment-prodamus-notification');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services']);
Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'privacy']);
Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->middleware('auth');


//mail
Route::get('send-mail', [App\Http\Controllers\MailController::class, 'index']);

///Admin
//Categories
Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('account')->middleware('auth');
Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/categories/new', [App\Http\Controllers\Admin\CategoryController::class, 'new'])->middleware(['auth', 'can:admin-part']);
Route::post('/admin/categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/categories/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->middleware(['auth', 'can:admin-part']);
Route::post('/admin/categories/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/categories/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->middleware(['auth', 'can:admin-part']);

//Performance
Route::get('/admin/performance', [App\Http\Controllers\Admin\PerformanceController::class, 'index'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/performance/new', [App\Http\Controllers\Admin\PerformanceController::class, 'new'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/performance/edit/{id}', [App\Http\Controllers\Admin\PerformanceController::class, 'edit'])->middleware(['auth', 'can:admin-part']);
Route::post('/admin/performance/create', [App\Http\Controllers\Admin\PerformanceController::class, 'create'])->middleware(['auth', 'can:admin-part']);
Route::post('/admin/performance/update', [App\Http\Controllers\Admin\PerformanceController::class, 'update'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/performance/delete/{id}', [App\Http\Controllers\Admin\PerformanceController::class, 'delete'])->middleware(['auth', 'can:admin-part']);

//Tracks
Route::get('/admin/tracks', [App\Http\Controllers\Admin\TrackController::class, 'index'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/tracks/new', [App\Http\Controllers\Admin\TrackController::class, 'new'])->middleware(['auth', 'can:admin-part']);
Route::post('/admin/tracks/create', [App\Http\Controllers\Admin\TrackController::class, 'create'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/tracks/edit/{id}', [App\Http\Controllers\Admin\TrackController::class, 'edit'])->middleware(['auth', 'can:admin-part']);
Route::post('/admin/tracks/update/{id}', [App\Http\Controllers\Admin\TrackController::class, 'update'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/tracks/delete/{id}', [App\Http\Controllers\Admin\TrackController::class, 'delete'])->middleware(['auth', 'can:admin-part']);

//Users
Route::get('/admin/users', [App\Http\Controllers\Admin\UserManageController::class, 'index'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/users/{id}/switch-status', [App\Http\Controllers\Admin\UserManageController::class, 'switch_status'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/users/{id}/switch-access', [App\Http\Controllers\Admin\UserManageController::class, 'switch_access'])->middleware(['auth', 'can:admin-part']);

//Applies
Route::get('/admin/applies', [App\Http\Controllers\Admin\ApplyController::class, 'index'])->middleware(['auth', 'can:admin-part']);

//Orders
Route::get('/admin/orders', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->middleware(['auth', 'can:admin-part']);

//Feedback
Route::get('/admin/feedback', [App\Http\Controllers\Admin\FeedbackController::class, 'index'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/feedback/new', [App\Http\Controllers\Admin\FeedbackController::class, 'new'])->middleware(['auth', 'can:admin-part']);
Route::post('/admin/feedback/create', [App\Http\Controllers\Admin\FeedbackController::class, 'create'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/feedback/edit/{id}', [App\Http\Controllers\Admin\FeedbackController::class, 'edit'])->middleware(['auth', 'can:admin-part']);
Route::post('/admin/feedback/update/{id}', [App\Http\Controllers\Admin\FeedbackController::class, 'update'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/feedback/delete/{id}', [App\Http\Controllers\Admin\FeedbackController::class, 'delete'])->middleware(['auth', 'can:admin-part']);


//Services
// Route::get('/admin/service/new', [App\Http\Controllers\Admin\PerformanceController::class, 'new'])->middleware(['auth', 'can:admin-part']);
Route::get('/admin/service', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->middleware(['auth', 'can:admin-part']);
// Route::get('/admin/service/edit/{id}', [App\Http\Controllers\Admin\PerformanceController::class, 'edit'])->middleware(['auth', 'can:admin-part']);
// Route::post('/admin/service/create', [App\Http\Controllers\Admin\PerformanceController::class, 'create'])->middleware(['auth', 'can:admin-part']);
// Route::post('/admin/service/update', [App\Http\Controllers\Admin\PerformanceController::class, 'update'])->middleware(['auth', 'can:admin-part']);
// Route::get('/admin/service/delete/{id}', [App\Http\Controllers\Admin\PerformanceController::class, 'delete'])->middleware(['auth', 'can:admin-part']);

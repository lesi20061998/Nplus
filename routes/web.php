<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\vnpayController;
use App\Http\Controllers\CoordinateController;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\usersController;
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


Route::get('/', [HomeController::class, 'index'])->name('payments.index');
Route::get('/Payment-service', [PaymentController::class, 'clientStore'])->name('client-service');


Route::post('/request-vnpay', [vnpayController::class, 'store'])->name('request-vnpay');
Route::get('/thong-tin-tra-cuu-quy-hoach-do-thi', function(){
    return view('client.servicePayment');
})->name('return-payment');


Route::get('/dich-vu-tra-cuu', function(){
    return view('client.about');
})->name('check-servicer');


Route::get('/paymentReturn',  [vnpayController::class, 'showPaymentReturn'])->name('showPaymentReturn');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/adminpayment', [PaymentController::class, 'index'])->name('request_informations.index');
    Route::post('/adminpayment', [vnpayController::class, 'update'])->name('request_informations.update');
    Route::get('/adminpayment/{id}', [vnpayController::class, 'destroy'])->name('destroy');
    Route::get('/export/{id}', [vnpayController::class, 'destroy'])->name('export');


    Route::get('/users/{id}/quick-delete', [usersController::class, 'destroyUser']);
    Route::get('/roles/{id}/quick-delete', [usersController::class, 'destroyRoles']);
    Route::get('/posts/{id}/quick-delete', [usersController::class, 'destroyPost']);
    Route::get('/pages/{id}/quick-delete', [usersController::class, 'destroyPagess']);
    Route::get('/categories/{id}/quick-delete', [usersController::class, 'destroyCategory']);

});




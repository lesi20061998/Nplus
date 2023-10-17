<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\vnpayController;
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
Route::post('/Payment-service', [PaymentController::class, 'clientStore'])->name('request-information.store');
Route::post('/request-vnpay', [vnpayController::class, 'paymentVNPAYQR'])->name('request-vnpay');
Route::get('/vnpay-return', function(){
    return view('client.vnpay_return');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
  
});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RequestInformationController;






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
    return view('welcome');
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
       // Định tuyến trang danh sách request_informations
       Route::get('/request_informations', [RequestInformationController::class, 'index'])->name('request_informations.index');
       // ... Định tuyến trước đã có ở bước trước
          // Định tuyến trang hiển thị thông tin chi tiết request_information
          Route::get('/request_informations/{requestInformation}', [RequestInformationController::class, 'show'])->name('request_informations.show');
          // Định tuyến trang chỉnh sửa request_information
          Route::get('/request_informations/{requestInformation}/edit', [RequestInformationController::class, 'edit'])->name('request_informations.edit');
          // Định tuyến cập nhật thông tin request_information
          Route::put('/request_informations/{requestInformation}', [RequestInformationController::class, 'update'])->name('request_informations.update');
          // Định tuyến xóa request_information
          Route::delete('/request_informations/{requestInformation}', [RequestInformationController::class, 'destroy'])->name('request_informations.destroy');
});


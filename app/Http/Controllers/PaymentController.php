<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Routing\Router;
use App\Models\RequestInformation;
use GuzzleHttp\Client;

class PaymentController extends Controller
{
    public function create()
    {
        return view('admin.request_informations.create');
    }
    // Hàm hiển thị dữ liệu Payment theo yêu cầu
    public function index()
    {
        $payments = Payment::with(['user', 'requestInformation'])
            ->select('id','access_code', 'order_status', 'payment_method', 'user_id', 'request_information_id','is_destroy')
            ->get()->where('is_destroy', '=', 1);
 
    return view('admin.request_informations.index', compact('payments'));
    }
    
  
   

 
 
}

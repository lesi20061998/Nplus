<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\RequestInformation;
use Illuminate\Routing\Router;

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
            ->select('access_code', 'order_status', 'payment_method', 'user_id', 'request_information_id')
            ->get();
        //    dd($payments);
        return view('admin.request_informations.index', compact('payments'));
    }
    

    public function destroyAndReturn($id)
    {
            $payment = Payment::find($id);
            $Information = RequestInformation::find($payment->request_information_id);
            $payment->delete();
            $Information->delete();
            return redirect()->route('request_information.index')->with('success', 'Payment has been deleted.');

          
    }
}

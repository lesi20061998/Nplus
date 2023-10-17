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
    

    //client
    public function clientStore(){
        $client = new Client();
        $response = $client->get('https://provinces.open-api.vn/api/');

        $data = json_decode($response->getBody(), true);
       
        return view('client.servicePayment',compact('data'));
    }
    public function store(Request $request)
    {
            // Xác thực dữ liệu form
        $validatedData = $request->validate([
            'organization_or_individual_name' => 'required|max:100',
         
        ]);

        // Nếu dữ liệu hợp lệ, tạo đối tượng RequestInformation và lưu vào cơ sở dữ liệu
        $requestInfo = RequestInformation::create($validatedData);

        // Redirect hoặc hiển thị thông báo thành công
        return redirect()->route('request-information.index')->with('success', 'Dữ liệu đã được thêm thành công.');
    }
}

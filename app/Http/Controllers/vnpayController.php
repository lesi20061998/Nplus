<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Routing\Router;
use App\Models\RequestInformation;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use url;
class vnpayController extends Controller
{
    public function paymentVNPAYQR()
    {


        //     $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        //     $vnp_Amount = 20000000000; // Số tiền thanh toán
        //     $vnp_Locale = "vn"; //Ngôn ngữ chuyển hướng thanh toán
        //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
        //     date_default_timezone_set('Asia/Ho_Chi_Minh');
        //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        //     $vnp_Returnurl = "http://localhost:8000/vnpay-return";
        //     $vnp_TmnCode = "N4BCJTZ0"; //Mã website tại VNPAY 
        //     $vnp_HashSecret = "BFUYSFDXWPHXOAYUYSYJLQJTSQAXFWQT"; //Chuỗi bí mật
        //     $vnp_OrderInfo ="nothing";
        //     $vnp_OrderType = "other";
        //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //     $inputData = array(
        //         "vnp_Version" => "2.1.0",
        //         "vnp_TmnCode" => $vnp_TmnCode,
        //         "vnp_Amount" => $vnp_Amount,
        //         "vnp_Command" => "pay",
        //         "vnp_CreateDate" => date('YmdHis'),
        //         "vnp_CurrCode" => "VND",
        //         "vnp_IpAddr" => $vnp_IpAddr,
        //         "vnp_Locale" => $vnp_Locale,
        //         "vnp_OrderInfo" => $vnp_OrderInfo,
        //         "vnp_OrderType" => $vnp_OrderType,
        //         "vnp_ReturnUrl" => $vnp_Returnurl,
        //         "vnp_TxnRef" => $vnp_TxnRef,

        //     );
        //     ksort($inputData);
        //     $query = "";
        //     $i = 0;
        //     $hashdata = "";
        //     foreach ($inputData as $key => $value) {
        //         if ($i == 1) {
        //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        //         } else {
        //             $hashdata .= urlencode($key) . "=" . urlencode($value);
        //             $i = 1;
        //         }
        //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
        //     }

        //     $vnp_Url = $vnp_Url . "?" . $query;
        //     if (isset($vnp_HashSecret)) {
        //         $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
        //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        //     }
        //    return Redirect::to($vnp_Url);



    }


    public function update(Request $request)
    {
        $id = $_POST['id_infomation'];
        $validated = $request->validate([
            'organization_or_individual_name' => 'required',
            'contact_person' => 'required',
            'Birthday' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'CDCD' => 'required',
            'DayCDCD' => 'required',
            'NameCDCD' => 'required',
            'DirecrtCDCD' => 'required',
            'city1' => 'required',
            'district1' => 'required',
            'ward1' => 'required',
            'contact_address_street' => 'required',
            'city2' => 'required',
            'district2' => 'required',
            'ward2' => 'required',
            'street' => 'required',
            'plot_number' => 'required',
            'area_size' => 'required',
            'sheet_number' => 'required',
            'coordinatesX2' => 'required',
            'coordinatesY2' => 'required',
            'coordinatesX3' => 'required',
            'coordinatesY3' => 'required',
            'coordinatesX4' => 'required',
            'coordinatesY4' => 'required',
            'coordinatesX5' => 'required',
            'coordinatesY5' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $coordinates = [

            ['x' => $validated['coordinatesX2'], 'y' => $validated['coordinatesY2']],
            ['x' => $validated['coordinatesX3'], 'y' => $validated['coordinatesY3']],
            ['x' => $validated['coordinatesX4'], 'y' => $validated['coordinatesY4']],
            ['x' => $validated['coordinatesX5'], 'y' => $validated['coordinatesY5']],
        ];
        $requestInformationModel = RequestInformation::find($id);
        $requestInformationModel->organization_or_individual_name = $validated['organization_or_individual_name'];
        $requestInformationModel->contact_person = $validated['contact_person'];
        $requestInformationModel->Birthday = $validated['Birthday'];
        $requestInformationModel->phone_number = $validated['phone_number'];
        $requestInformationModel->email = $validated['email'];
        $requestInformationModel->CDCD = $validated['CDCD'];
        $requestInformationModel->DayCDCD = $validated['DayCDCD'];
        $requestInformationModel->NameCDCD = $validated['NameCDCD'];
        $requestInformationModel->DirecrtCDCD = $validated['DirecrtCDCD'];
        $requestInformationModel->contact_address_city = $validated['city1'];
        $requestInformationModel->contact_address_district = $validated['district1'];
        $requestInformationModel->contact_address_street = $validated['contact_address_street'];
        $requestInformationModel->contact_address_ward =  $validated['ward1'];
        $requestInformationModel->district = $validated['district2'];
        $requestInformationModel->ward = $validated['ward2'];
        $requestInformationModel->street = $validated['street'];
        $requestInformationModel->plot_number = $validated['plot_number'];
        $requestInformationModel->sheet_number = $validated['sheet_number'];
        $requestInformationModel->area_size = $validated['area_size'];
        // $requestInformationModel->ImageUrl = $imageName;
        $requestInformationModel->coordinates = json_encode($coordinates);
        $requestInformationModel->save();
    //    dd($requestInformationModel->save());
        return redirect()->route('request_informations.index')->with('update', 'Payment has been update.');
    }



    public function store(Request $request)
    {

        $validated = $request->validate([
            'organization_or_individual_name' => 'required',
            'contact_person' => 'required',
            'Birthday' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'CDCD' => 'required',
            'DayCDCD' => 'required',
            'NameCDCD' => 'required',
            'DirecrtCDCD' => 'required',
            'sheet_number' => 'required',
            'city1' => 'required',
            'district1' => 'required',
            'ward1' => 'required',
            'contact_address_street' => 'required',
            'city2' => 'required',
            'district2' => 'required',
            'ward2' => 'required',
            'street' => 'required',
            'plot_number' => 'required',
            'area_size' => 'required',
            'coordinatesX1' => 'required',
            'coordinatesY1' => 'required',
            'coordinatesX2' => 'required',
            'coordinatesY2' => 'required',
            'coordinatesX3' => 'required',
            'coordinatesY3' => 'required',
            'coordinatesX4' => 'required',
            'coordinatesY4' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
       
        $path = public_path('asset/images/');
        !is_dir($path) &&
            mkdir($path, 0777, true);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move($path, $imageName);


      
        $coordinates = [
            ['x' => $validated['coordinatesX1'], 'y' => $validated['coordinatesY1']],
            ['x' => $validated['coordinatesX2'], 'y' => $validated['coordinatesY2']],
            ['x' => $validated['coordinatesX3'], 'y' => $validated['coordinatesY3']],
            ['x' => $validated['coordinatesX4'], 'y' => $validated['coordinatesY4']],
        ];
        $requestInformationModel = new RequestInformation();
        $requestInformationModel->organization_or_individual_name = $validated['contact_person'];
        $requestInformationModel->contact_person = $validated['contact_person'];
        $requestInformationModel->Birthday = $validated['Birthday'];
        $requestInformationModel->contact_address_city = $validated['city1'];
        $requestInformationModel->contact_address_district = $validated['district1'];
        $requestInformationModel->contact_address_ward = $validated['ward1'];
        $requestInformationModel->contact_address_street = $validated['contact_address_street'];
        $requestInformationModel->city = $validated['city2'];
        $requestInformationModel->district = $validated['district2'];
        $requestInformationModel->ward = $validated['ward2'];
        $requestInformationModel->street = $validated['street'];
        $requestInformationModel->phone_number = $validated['phone_number'];
        $requestInformationModel->email = $validated['email'];
        $requestInformationModel->CDCD = $validated['CDCD'];
        $requestInformationModel->DayCDCD = $validated['DayCDCD'];
        $requestInformationModel->NameCDCD = $validated['NameCDCD'];
        $requestInformationModel->DirecrtCDCD = $validated['DirecrtCDCD'];
        $requestInformationModel->plot_number = $validated['plot_number'];
        $requestInformationModel->sheet_number = $validated['sheet_number'];
        $requestInformationModel->area_size = $validated['area_size'];
        $requestInformationModel->ImageUrl = $imageName;
        $requestInformationModel->coordinates = json_encode($coordinates);
        $requestInformationModel->save();
        $payment = new Payment();
        $accessCode = str_pad(rand(1, 9999999), 6, '0', STR_PAD_LEFT);
        if (Payment::where('access_code', $accessCode)->exists()) {
            $accessCode = str_pad(rand(1, 9999999), 6, '0', STR_PAD_LEFT);
        }
        $accessCode = 'Nlus_' . $accessCode;
        $payment->access_code = $accessCode;
        $payment->order_status = 'Chưa Thanh Toán';
        $payment->payment_method = 'banking';
        $payment->is_destroy = 1;
        $payment->payment_id_Backdoor = uniqid();
        $payment->request_information_id = $requestInformationModel->id;
        $payment->user_id = 1;
        if (isset($_POST['bankCode']) == "Interbanking") {
         
            $payment->save();
            return view('client.paymentReturn')->with('payment', $payment)->with('requestInformationModel', $requestInformationModel);
        }
    }
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->is_destroy = 0;
        $payment->save();
        return redirect()->route('request_informations.index')->with('delete', 'Payment has been deleted.');
    }
    public function export($id)
    {
        
        $payment = RequestInformation::find($id);
       
        $organization_or_individual_name = $payment->organization_or_individual_name;
        $contact_person = $payment->contact_person;
        $Birthday = $payment->Birthday;
        $contact_address_city = $payment->contact_address_city;
        $contact_address_district = $payment->contact_address_district;
        $contact_address_ward = $payment->contact_address_ward;
        $contact_address_street = $payment->contact_address_street;
        $city = $payment->city;
        $district = $payment->district;
        $ward = $payment->ward;
        $street = $payment->street;
        $phone_number = $payment->phone_number;
        $email = $payment->email;
        $DirecrtCDCD = $payment->DirecrtCDCD;
        $sheet_number = $payment->sheet_number;
        $plot_number = $payment->plot_number;
        $area_size = $payment->area_size;
        $coordinates = $payment->coordinates;
        $ImageUrl = $payment->ImageUrl;

        // dd($coordinates);
        $arr = json_decode($coordinates);
        $coordinatesX1 = $arr[0]->x;
        $coordinatesY1 = $arr[0]->y;
        $coordinatesX2 = $arr[1]->x;
        $coordinatesY2 = $arr[1]->y;
        $coordinatesX3 = $arr[2]->x;
        $coordinatesY3 = $arr[2]->y;
        $coordinatesX4 = $arr[3]->x;
        $coordinatesY4 = $arr[3]->y;
     
     
        
        //file docs
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $templateProcessor = new TemplateProcessor('template.docx');   
       
        $templateProcessor->setValues(
        [
            'organization_or_individual_name'=>$organization_or_individual_name,
            'contact_person'=>$contact_person,
            'Birthday'=>$Birthday,
            'contact_address_city'=>$contact_address_city,
            'contact_address_district'=>$contact_address_district,
            'contact_address_ward'=>$contact_address_ward,
            'contact_address_street'=>$contact_address_street,
            'city'=>$city,
            'district'=>$district,
            'ward'=>$ward,
            'street'=>$street,
            'phone_number'=>$phone_number,
            'email'=>$email,
            'DirecrtCDCD'=>$DirecrtCDCD,
            'sheet_number'=>$sheet_number,
            'plot_number'=>$plot_number,
            'area_size'=>$area_size,
            'coordinatesX1'=>$coordinatesX1,
            'coordinatesY1'=>$coordinatesY1,
            'coordinatesX2'=>$coordinatesX2,
            'coordinatesY2'=>$coordinatesY2,
            'coordinatesX3'=>$coordinatesX3,
            'coordinatesY3'=>$coordinatesY3,
            'coordinatesX4'=>$coordinatesX4,
            'coordinatesY4'=>$coordinatesY4,
          
        ]
    );
        $pathToSave = $organization_or_individual_name.'.docx';
        $templateProcessor->saveAs($pathToSave);
        $filename = basename($organization_or_individual_name.'.docx');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        readfile($organization_or_individual_name.'.docx');
    }
}

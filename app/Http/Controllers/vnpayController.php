<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Routing\Router;
use App\Models\RequestInformation;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Env;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\Style\TablePosition;
use PhpOffice\PhpWord\SimpleType\TblWidth;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\Style\Table;
use Illuminate\Support\Facades\Word;
use PhpOffice\PhpWord\Shared\Drawing\Image;

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
    public function store(Request $request)
    {

        // Lấy giá trị của checkbox
        $infomation_Check = $request->get('infomation_Check');

        // Nếu checkbox được check thì giá trị sẽ là 1
        if ($infomation_Check) {
            $infomation_Check = 1;
        } else {
            // Nếu checkbox không được check thì giá trị sẽ là 0
            $infomation_Check = 0;
        }

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
            'requestinfomation_function' => 'required',
            'Reason' => 'required',
            'coordinatesX.*' => 'required',
            'coordinatesY.*' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        // dd($validated);

        $coordinates = [];

        foreach ($validated['coordinatesX'] as $index => $x) {
            $y = $validated['coordinatesY'][$index];
            $coordinates[] = ['x' => $x, 'y' => $y];
        }
        $coordinatesjson = json_encode($coordinates);


        $path = public_path('asset/images/');
        !is_dir($path) &&
            mkdir($path, 0777, true);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move($path, $imageName);

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


        $requestInformationModel->Reason = $validated['Reason'];
        $requestInformationModel->infomation_Check = $infomation_Check;
        $requestInformationModel->requestinfomation_function = $validated['requestinfomation_function'];


        $requestInformationModel->ImageUrl = $imageName;
        $requestInformationModel->coordinates = $coordinatesjson;
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
          
            // Lưu requestInformationModel và payment vào session để sử dụng sau này
            session(['payment' => $payment]);
            session(['requestInformationModel' => $requestInformationModel]);
           // Redirect người dùng đến trang khác để tránh làm mới trang
            return redirect()->route('showPaymentReturn');
       
        }
    }
    public function showPaymentReturn()
    {
        // Lấy payment và requestInformationModel từ session
        $payment = session('payment');
        $requestInformationModel = session('requestInformationModel');

        if (!$payment || !$requestInformationModel) {
            // Xử lý trường hợp không tìm thấy payment hoặc requestInformationModel
            return redirect()->route('home'); // Hoặc điều hướng đến trang khác nếu cần
        }

        return view('client.paymentReturn')
            ->with('payment', $payment)
            ->with('requestInformationModel', $requestInformationModel);
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
            'requestinfomation_function' => 'required',
            'Reason' => 'required',
            'coordinatesX.*' => 'required',
            'coordinatesY.*' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $coordinatesX = $request->input('coordinatesX');
        $coordinatesY = $request->input('coordinatesY');

        $coordinates = [];

        $infomation_Check = $request->get('infomation_Check');

        // Nếu checkbox được check thì giá trị sẽ là 1
        if ($infomation_Check) {
            $infomation_Check = 1;
        } else {
            // Nếu checkbox không được check thì giá trị sẽ là 0
            $infomation_Check = 0;
        }
        foreach ($validated['coordinatesX'] as $index => $x) {
            $y = $validated['coordinatesY'][$index];
            $coordinates[] = ['x' => $x, 'y' => $y];
        }

        $coordinatesjson = json_encode($coordinates);


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
        $requestInformationModel->Reason = $validated['Reason'];
        $requestInformationModel->infomation_Check = $infomation_Check;
        $requestInformationModel->requestinfomation_function = $validated['requestinfomation_function'];

        // $requestInformationModel->ImageUrl = $imageName;
        $requestInformationModel->coordinates = $coordinatesjson;
        $requestInformationModel->save();

        return redirect()->route('request_informations.index')->with('update', 'Payment has been update.');
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

        $templatePath = 'template.docx';
        $template = new TemplateProcessor($templatePath);
        $request = RequestInformation::find($id);
        $data = json_decode($request->coordinates);
        $template->setValues([
            'organization_or_individual_name' => $request->organization_or_individual_name,
            'contact_person' => $request->contact_person,
            'Birthday' => $request->Birthday,
            'contact_address_city' => $request->contact_address_city,
            'contact_address_district' => $request->contact_address_district,
            'contact_address_ward' => $request->contact_address_ward,
            'contact_address_street' => $request->contact_address_street,
            'city' => $request->city,
            'district' => $request->district,
            'ward' => $request->ward,
            'street' => $request->street,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'DirecrtCDCD' => $request->DirecrtCDCD,
            'sheet_number' => $request->sheet_number,
            'plot_number' => $request->plot_number,
            'area_size' => $request->area_size,
            'Reason' => $request->Reason,
            'requestinfomation_function' => $request->requestinfomation_function,
        ]);

        $table = new \PhpOffice\PhpWord\Element\Table(3, array(['borderSize' => 6, 'bold' => true, 'name' => 'Cambria']));
        $table->addRow();
        $table->addCell(3000)->addText('STT');
        $table->addCell(3000)->addText('coordinateX');
        $table->addCell(3000)->addText('coordinateY');
        foreach ($data as $key => $coordinate) {
            $table->addRow();
            $table->addCell(3000)->addText($key + 1);
            $table->addCell(3000)->addText($coordinate->x);
            $table->addCell(3000)->addText($coordinate->y);
        }
        $template->setComplexBlock('COORDINATES_TABLE', $table);
        $ImageUrl = $request->ImageUrl;
        //  Đường dẫn tới file hình ảnh upload hình 
        // $imagePath = asset('asset').'/images/'.$ImageUrl;
        $imagePath = "https://images-na.ssl-images-amazon.com/images/I/61NRsJeymIL._SL1500_.jpg";
        // dd($imagePath);
        $template->setImageValue('HINH_ANH', [
            'path' => $imagePath,
            'width' => 500,
            'height' => 500,
        ]);
        $filename = 'generated_document.docx';
        $template->saveAs(storage_path($filename));

        return response()->download(storage_path($filename))->deleteFileAfterSend(true);
    }
}

@extends('client.layout.master')

@section('content')
<?php

$payment = $payment;
$requestInformationModel = $requestInformationModel;
// dd($payment->access_code);
?>

    <section>
        <!--Begin display -->
        <div class="container">     
            <div class="table-responsive">
                <div class="form-group">
                <label style="padding-bottom: 10px;"> Mã Tra Cứu khách Hàng: {{$payment->access_code}}</label><br>
                    <label style="padding-bottom: 10px;"> Xin Chào Quý Khách: {{$requestInformationModel->contact_person}}</label><br>
                    <p style="padding-bottom: 10px;">Chúng  tôi đã nhận được thông tin từ Quý khách  </p>
                    <label style="padding-bottom: 10px;"> Tình Trạng Đơn Hàng: <label style="color: red; padding-bottom: 10px;">{{$payment->order_status}}</label><br>
                    <label style="padding-bottom: 10px;"> Thông Tin Thanh Toán: Vietcombank </label><br>
                    <label style="padding-bottom: 10px;"> Tên Tài khoản: Công Ty TNHH DVTV VA </label><br>
                    <label style="padding-bottom: 10px;"> Số Tài khoản: 105237850 </label><br>
                    <button class="Btn btn-primary"> Tra Cứu Thông Tin</button>
                </div>
                
            </div>
        </div>
    </section>
    <style>
        .table-responsive {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 550px;
        }
    </style>
@endsection




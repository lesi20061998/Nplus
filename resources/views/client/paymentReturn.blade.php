@extends('client.layout.master')

@section('content')
<?php

$payment = $payment;
$requestInformationModel = $requestInformationModel;
dd($payment);
?>

    <section>
        <!--Begin display -->
        <div class="container">     
            <div class="table-responsive">
                <div class="form-group">
                    <label style="padding-bottom: 10px;"> Xin Chào Quý Khách: {{$requestInformationModel->contact_person}}</label><br>
                    <p style="padding-bottom: 10px;">Chúng  tôi đã nhận được thông tin từ Quý khách  </p>
                    <label style="padding-bottom: 10px;"> Xin Chào Quý Khách: {{$payment->access_code}}</label><br>
                    <label style="padding-bottom: 10px;"> Tình Trạng Đơn Hàng: <label style="color: red; padding-bottom: 10px;">{{$payment->order_status}}</label><br>
                    
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
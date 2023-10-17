@extends('client.layout.master')

@section('content')
<style>
    .payment-infomation {
        margin: 90px 0;
    }

    .form-group>label {
        margin-bottom: 10px;
    }


    #province,
    #district,
    #ward {
        width: 100%;
        height: 30%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>


<section class="section payment-infomation">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('request-information.store') }}">
                    @csrf
                    <div class="form-infomation-group">
                        <div class="form-group">
                            <div class="row">


                                <div class="col-3">
                                    <label for="organization_or_individual_name" class="mb-2">Người Liên hệ:</label>
                                    <input type="text" id="organization_or_individual_name" class="form-control" name="organization_or_individual_name" value="{{ old('organization_or_individual_name') }}">
                                    @error('organization_or_individual_name')
                                    <style>
                                        label {
                                            color: red;
                                        }
                                    </style>
                                    <small style="color:red"> Người Liên hệ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label for="organization_or_individual_name" class="mb-2">Ngày Sinh:</label>


                                    <input type="date" id="data-pick" name="date" class="form-control" value="{{ old('organization_or_individual_name') }}">

                                    @error('organization_or_individual_name')
                                    <style>
                                        label {
                                            color: red;
                                        }
                                    </style>
                                    <small style="color:red"> Người Liên hệ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label for="organization_or_individual_name" class="mb-2">Số điện thoại:</label>
                                    <input type="text" id="organization_or_individual_name" class="form-control" name="organization_or_individual_name" value="{{ old('organization_or_individual_name') }}">
                                    @error('organization_or_individual_name')
                                    <style>
                                        label {
                                            color: red;
                                        }
                                    </style>
                                    <small style="color:red"> Số điện thoại chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label for="organization_or_individual_name" class="mb-2">Email</label>
                                    <input type="text" id="organization_or_individual_name" class="form-control" name="organization_or_individual_name" value="{{ old('organization_or_individual_name') }}">
                                    @error('organization_or_individual_name')
                                    <style>
                                        label {
                                            color: red;
                                        }
                                    </style>
                                    <small style="color:red"> Email có thể chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">

                                <div class="col-6">
                                    <label for="organization_or_individual_name" class="mb-2">Căn Cước công đân</label>
                                    <input type="text" id="organization_or_individual_name" class="form-control" name="organization_or_individual_name" value="{{ old('organization_or_individual_name') }}">
                                    @error('organization_or_individual_name')
                                    <style>
                                        label {
                                            color: red;
                                        }
                                    </style>
                                    <small style="color:red"> Căn Cước công đânchưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="organization_or_individual_name" class="mb-2">Số tờ Tùy Thân:</label>
                                    <input type="text" id="organization_or_individual_name" class="form-control" name="organization_or_individual_name" value="{{ old('organization_or_individual_name') }}">
                                    @error('organization_or_individual_name')
                                    <style>
                                        label {
                                            color: red;
                                        }
                                    </style>
                                    <small style="color:red">Số tờ Tùy Thân chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="organization_or_individual_name" class="mb-2">Ngày cấp</label>
                                    <input type="date" id="organization_or_individual_name" class="form-control" name="organization_or_individual_name" value="{{ old('organization_or_individual_name') }}">
                                    @error('organization_or_individual_name')
                                    <style>
                                        label {
                                            color: red;
                                        }
                                    </style>
                                    <small style="color:red">Ngày cấp chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="organization_or_individual_name" class="mb-2">Nơi cấp</label>
                                    <input type="input" id="organization_or_individual_name" class="form-control" name="organization_or_individual_name" value="{{ old('organization_or_individual_name') }}">
                                    @error('organization_or_individual_name')
                                    <style>
                                        label {
                                            color: red;
                                        }
                                    </style>
                                    <small style="color:red">Nơi cấp chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="organization_or_individual_name" class="mb-2">Chọn Tỉnh/ Thành phố</label>
                                    <select class="form-select" id="province">

                                    </select>

                                </div>
                                <div class="col-md-3">
                                    <label for="organization_or_individual_name" class="mb-2">Chọn Quận/ huyện</label>
                                    <select class="form-select" id="district">
                                    </select>

                                </div>
                                <div class="col-md-3">
                                    <label for="organization_or_individual_name" class="mb-2">Chọn Phường/Xã</label>
                                    <select class="form-select" id="ward">
                                        <option value="">chọn quận</option>
                                    </select>

                                </div>
                                <div class="col-md-3">
                                    <label for="organization_or_individual_name" class="mb-2">Địa Chỉ Chi tiết</label>
                                    <input type="text" id="contact_person" class="form-control" name="contact_person" value="{{ old('contact_person') }}">
                                    @error('contact_person')
                                    <small style="color:red"> Tên Tổ Chức và cá nhân chưa nhập hoặc có thể nhập sai</small>
                                    @enderror

                                </div>

                            </div>
                        </div>

                    </div>
                </form>


            </div>
        </div>
        <form action="{{ route('request-vnpay') }}" id="frmCreateOrder" method="post">
                @csrf
              
                <div class="form-group">      
                <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                    <label for="bankCode">Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</label>
                </div>


                <div class="form-group">      
                    <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                    <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label>
                </div>
                <div class="form-group">
                    <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                    <label for="bankCode">Thanh toán qua thẻ quốc tế</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" >Thanh toán</button>
                </div>
              


                   


                   

               

              
            </form>
    </div>
</section>


<script>

</script>



@endSection
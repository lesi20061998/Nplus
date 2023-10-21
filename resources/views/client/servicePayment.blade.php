@extends('client.layout.master')

@section('content')
<style>
    .payment-infomation {
        margin: 90px 0;
    }

    .form-group>label {
        margin-bottom: 10px;
    }

    #city1,
    #district1,
    #ward1,
    #city2,
    #district2,
    #ward2 {
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
            <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <form method="POST" action="{{ route('request-vnpay') }}" id="frmCreateOrder" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                    <!-- <input type="hidden" name="id_infomation" > -->
                                    <label for="organization_or_individual_name" class="mb-2">Tên Tổ chức Cá nhân</label>
                                    <input type="text" id="organization_or_individual_name" class="form-control" name="organization_or_individual_name" value="{{ old('organization_or_individual_name') }}">
                                    @error('organization_or_individual_name')
                                    <small style="color:red">Tên Tổ chức Cá nhân chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3 pt-2">
                                    <label for="contact_person" class="mb-2">Người Liên hệ:</label>
                                    <input type="text" id="contact_person" class="form-control" name="contact_person" value="{{ old('contact_person') }}">
                                    @error('contact_person')
                                    <small style="color:red"> Người Liên hệ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3 pt-2">
                                    <label for="Birthday" class="mb-2">Ngày Sinh:</label>
                                    <input type="date" id="data-pick" name="Birthday" class="form-control" value="{{ old('Birthday') }}">
                                    @error('Birthday')
                                    <small style="color:red"> Người Liên hệ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3 pt-2">
                                    <label for="phone_number" class="mb-2">Số điện thoại:</label>
                                    <input type="text" id="phone_number" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                    <small style="color:red"> Số điện thoại chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3">
                                    <label for="email" class="mb-2">Email</label>
                                    <input type="text" id="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <small style="color:red"> Email có thể chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">

                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3">
                                    <label for="CDCD" class="mb-2">Căn Cước công đân</label>
                                    <input type="text" id="CDCD" class="form-control" name="CDCD" value="{{ old('CDCD') }}">
                                    @error('CDCD')
                                    <small style="color:red"> Căn Cước công đân chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3">
                                    <label for="NameCDCD" class="mb-2">Số tờ Tùy Thân:</label>
                                    <input type="text" id="NameCDCD" class="form-control" name="NameCDCD" value="{{ old('NameCDCD') }}">
                                    @error('NameCDCD')
                                    <small style="color:red">Số tờ Tùy Thân chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3">
                                    <label for="DayCDCD" class="mb-2">Ngày cấp</label>
                                    <input type="date" id="DayCDCD" class="form-control" name="DayCDCD" value="{{ old('DayCDCD') }}">
                                    @error('DayCDCD')
                                    <small style="color:red">Ngày cấp chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3">
                                    <label for="DirecrtCDCD" class="mb-2">Nơi cấp</label>
                                    <input type="input" id="DirecrtCDCD" class="form-control" name="DirecrtCDCD" value="{{ old('DirecrtCDCD') }}">
                                    @error('DirecrtCDCD')
                                    <small style="color:red">Nơi cấp chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3">

                                    <label for="contact_address_district" class="mb-2">Chọn Tỉnh/ Thành phố</label>
                                    <select class="form-select" name="city1" id="city1">

                                    </select>

                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3">
                                    <label for="contact_address_ward" class="mb-2">Chọn Quận/ huyện</label>
                                    <select class="form-select" name="district1" id="district1">
                                    </select>

                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3">
                                    <label for="contact_address_street" class="mb-2">Chọn Phường/Xã</label>
                                    <select class="form-select" name="ward1" id="ward1">
                                        <option value="">chọn quận</option>
                                    </select>

                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3">
                                    <label for="contact_address_street" class="mb-2">Địa Chỉ Chi tiết</label>
                                    <input type="text" id="contact_address_street" class="form-control" name="contact_address_street" value="{{ old('contact_address_street') }}">
                                    @error('contact_address_street')
                                    <small style="color:red"> Địa chỉ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror

                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                    <label for="organization_or_individual_name" class="mb-2">thông Tin Tra Cứu</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3">
                                    <label for="organization_or_individual_name" class="mb-2">Chọn Tỉnh/ Thành phố</label>
                                    <select class="form-select" name="city2" id="city2">
                                    </select>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3">
                                    <label for="organization_or_individual_name" class="mb-2">Chọn Quận/ huyện</label>
                                    <select class="form-select" name="district2" id="district2">
                                    </select>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3">
                                    <label for="organization_or_individual_name" class="mb-2">Chọn Phường/Xã</label>
                                    <select class="form-select" name="ward2" id="ward2">
                                        <option value="">chọn quận</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 pt-3">
                                    <label for="organization_or_individual_name" class="mb-2">Địa Chỉ Chi tiết</label>
                                    <input type="text" id="address" class="form-control" name="street" value="{{ old('address') }}">
                                    @error('address')
                                    <small style="color:red"> Địa chỉ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 pt-3">
                                    <label for="sheet_number" class="mb-2">Số Tờ:</label>
                                    <input type="text" id="sheet_number" class="form-control" name="sheet_number" value="{{ old('sheet_number') }}">
                                    @error('sheet_number')
                                    <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 pt-3">
                                    <label for="plot_number" class="mb-2">Số Thửa<a href=""></a>:</label>
                                    <input type="text" id="plot_number" class="form-control" name="plot_number" value="{{ old('plot_number') }}">
                                    @error('plot_number')
                                    <small style="color:red">Số Thửa chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 pt-3">
                                    <label for="area_size" class="mb-2">Diện tích<a href=""></a>:</label>
                                    <input type="text" id="area_size" class="form-control" name="area_size" value="{{ old('area_size') }}">
                                    @error('area_size')
                                    <small style="color:red">Diện tích chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3">
                                    <label for="sheet_number" class="mb-2">Vị trí Tọa độ 1</label>
                                    <input type="text" id="sheet_number" class="form-control" name="coordinatesX1" value="{{ old('coordinatesX1') }}">
                                    @error('sheet_number')
                                    <small style="color:red">Vị trí Tọa độ X chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3">
                                    <label for="sheet_number" class="mb-2">Vị trí Tọa độ Y 1</label>
                                    <input type="text" id="sheet_number" class="form-control" name="coordinatesY1" value="{{ old('coordinatesY1') }}">
                                    @error('sheet_number')
                                    <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3">
                                    <label for="sheet_number" class="mb-2">Vị trí Tọa độ 2</label>
                                    <input type="text" id="sheet_number" class="form-control" name="coordinatesX2" value="{{ old('coordinatesX2') }}">
                                    @error('sheet_number')
                                    <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3">
                                    <label for="sheet_number" class="mb-2">Vị trí Tọa độ Y 2</label>
                                    <input type="text" id="sheet_number" class="form-control" name="coordinatesY2" value="{{ old('coordinatesY2') }}">
                                    @error('sheet_number')
                                    <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3">
                                    <label for="sheet_number" class="mb-2">Vị trí Tọa độ 3</label>
                                    <input type="text" id="sheet_number" class="form-control" name="coordinatesX3" value="{{ old('coordinatesX3') }}">
                                    @error('sheet_number')
                                    <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3">
                                    <label for="sheet_number" class="mb-2">Vị trí Tọa độ 3</label>
                                    <input type="text" id="sheet_number" class="form-control" name="coordinatesY3" value="{{ old('coordinatesY3') }}">
                                    @error('sheet_number')
                                    <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3">
                                    <label for="sheet_number" class="mb-2">Vị trí Tọa độ X 4</label>
                                    <input type="text" id="sheet_number" class="form-control" name="coordinatesX4" value="{{ old('coordinatesX4') }}">
                                    @error('sheet_number')
                                    <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3">
                                    <label for="sheet_number" class="mb-2">Vị trí Tọa độ y 4</label>
                                    <input type="text" id="sheet_number" class="form-control" name="coordinatesY4" value="{{ old('coordinatesY4') }}">
                                    @error('sheet_number')
                                    <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 p-3">
                                    <label for="image" class="mb-2">Đính kèm hình ảnh chụp </label>
                                    <input type="file" id="image" class="form-control" name="image" value="{{ old('image') }}">
                                    @error('image')
                                    <small style="color:red">Hình ảnh thiếu</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                            <label for="bankCode">Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                            <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội dịa</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                            <label for="bankCode">Thanh toán qua thẻ quốc tế</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="bankCode" name="bankCode" value="Interbanking">
                            <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội dịa</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thanh toán</button>
                        </div>
                 

                </form>


            </div>
        </div>

    </div>
</section>




@endSection
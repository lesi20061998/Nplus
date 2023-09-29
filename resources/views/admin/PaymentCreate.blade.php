@extends('voyager::master');
@section('content')

<section class="form-create-form">
    <div class="container">
        <div class="row">
            <form>
                <div class="container">
                    <div class="row">
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Tên tổ chức /cá nhân đề nghị*</label>
                            <input required="" type="text" class="form-control" name="Namme" style="width:90%" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Người liên hệ (nếu có): </label>
                            <input required="" type="text" class="form-control" name="Namme"  style="width:90%" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Địa chỉ liên hệ:</label>
                            <input required="" type="text" class="form-control" name="Namme"  style="width:90%" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Số điện thoại*:</label>
                            <input required="" type="text" class="form-control" name="Namme" style="width:90%" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Email*:</label>
                            <input required="" type="text" class="form-control" name="Namme" style="width:90%" value="">
                        </div>

                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Thông tin Tra Cứu</label>
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Địa chỉ*:</label>
                            <input required="" type="text" class="form-control" name="Namme"  style="width:90%" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Số tờ:</label>
                            <input required="" type="text" class="form-control" name="Namme" style="width:90%" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Số Thửa:</label>
                            <input required="" type="text" class="form-control" name="Namme" style="width:90%" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Số hiệu điểm</label>
                            <input required="" type="text" class="form-control" name="Namme"  style="width:90%" value="">
                        </div>

                        <div class="form-group  col-md-6">
                            <label class="control-label" for="name">Tọa độ X</label>
                            <input required="" type="text" class="form-control" name="Namme"  style="width:90%" value="">
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="name">Tọa độ Y</label>
                            <input required="" type="text" class="form-control" name="Namme"  style="width:90%" value="">
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
</section>

@endsection
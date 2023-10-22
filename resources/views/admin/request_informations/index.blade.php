@extends('voyager::master')
@section('content')

<div class="side-body padding-top">
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-news"></i> Thông Tin Thụ Lý
        </h1>


    </div>
    <div id="voyager-notifications"></div>
    <div class="page-content browse container-fluid">
        <div class="alerts">
            @if(session('delete'))
            <div class="alert alert-warning" role="alert">
                {{ session('delete') }}
            </div>
            @elseif(session('update'))
            <div class="alert alert-success" role="alert">
                {{ session('update') }}
            </div>
            @endif


        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            <div class="row">
                                <div class="col-sm-12">

                                    <table id="table_id" class="display">
                                        <thead>
                                            <tr>
                                                <th> Mã Khách Hàng</th>
                                                <th> Người Thụ Lý</th>
                                                <th> Trạng Thái</th>
                                                <th>Banking Method</th>
                                                <th class="actions text-right dt-not-orderable sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 151.417px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($payments as $requestInformation)

                                            <tr>
                                                <td>{{$requestInformation->access_code}}</td>
                                                <td>{{ $requestInformation->user->name }}</td>
                                                <td>{{ $requestInformation->order_status }}</td>
                                                <td>{{ $requestInformation->payment_method }}</td>

                                                <td>

                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $requestInformation->id }}" data-whatever="@mdo">Xem Thông Tin Thụ Lý</button>
                                                    <a href="{{route('request_informations.update')}}/{{$requestInformation->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">delete</a>
                                                    <a href="export/{{$requestInformation->request_information_id}}" class="btn btn-primary">Xuất Ra File Word</a>
                                                </td>
                                                <div class="modal fade" id="exampleModal{{ $requestInformation->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $requestInformation->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel{{ $requestInformation->id }}">Thông Tin Khách Hàng</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route('request_informations.update') }}" id="frmCreateOrder" method="post">
                                                                    @csrf
                                                                    <div class="form-infomation-group">

                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-12">

                                                                                    <input type="hidden" name="id_infomation" value="{{$requestInformation->requestInformation->id}}">
                                                                                    <label for="organization_or_individual_name" class="mb-2">Tên Tổ chức Cá nhân</label>
                                                                                    <input type="text" id="organization_or_individual_name" class="form-control" style="width:150px" name="organization_or_individual_name" value="{{$requestInformation->requestInformation->organization_or_individual_name  }}">
                                                                                    @error('organization_or_individual_name')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red">Tên Tổ chức Cá nhân chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label for="contact_person" class="mb-2">Người Liên hệ:</label>
                                                                                    <input type="text" id="contact_person" class="form-control" style="width:150px" name="contact_person" value="{{ $requestInformation->requestInformation->contact_person}}">
                                                                                    @error('contact_person')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red"> Người Liên hệ chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label for="Birthday" class="mb-2">Ngày Sinh:</label>
                                                                                    <input type="date" id="data-pick" name="Birthday" class="form-control" value="{{ $requestInformation->requestInformation->Birthday  }}">
                                                                                    @error('Birthday')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red"> Người Liên hệ chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label for="phone_number" class="mb-2">Số điện thoại: <a href="tel:{{$requestInformation->requestInformation->phone_number}}">{{$requestInformation->requestInformation->phone_number}}</a> </label>
                                                                                    <input type="text" id="phone_number" class="form-control" name="phone_number" value="{{  $requestInformation->requestInformation->phone_number }}">

                                                                                    @error('phone_number')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red"> Số điện thoại chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label for="email" class="mb-2">Email</label>
                                                                                    <input type="text" id="email" class="form-control" style="width:150px" name="email" value="{{  $requestInformation->requestInformation->email }}">
                                                                                    @error('email')
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
                                                                                    <label for="CDCD" class="mb-2">Căn Cước công đân</label>
                                                                                    <input type="text" id="CDCD" class="form-control" style="width:150px" name="CDCD" value=" {{   $requestInformation->requestInformation->CDCD }}">
                                                                                    @error('CDCD')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red"> Căn Cước công đân chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <label for="NameCDCD" class="mb-2">Số tờ Tùy Thân:</label>
                                                                                    <input type="text" id="NameCDCD" class="form-control" style="width:150px" name="NameCDCD" value="{{$requestInformation->requestInformation->NameCDCD }}">
                                                                                    @error('NameCDCD')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red">Số tờ Tùy Thân chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="col-6">
                                                                                    <label for="DayCDCD" class="mb-2">Ngày cấp</label>
                                                                                    <input type="date" id="data-pick" name="DayCDCD" class="form-control" value="{{$requestInformation->requestInformation->DayCDCD}}">

                                                                                    @error('DayCDCD')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red">Ngày cấp chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <label for="DirecrtCDCD" class="mb-2">Nơi cấp</label>
                                                                                    <input type="input" id="DirecrtCDCD" class="form-control" style="width:150px" name="DirecrtCDCD" value=" {{$requestInformation->requestInformation->DirecrtCDCD }}  ">
                                                                                    @error('DirecrtCDCD')
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
                                                                                <div class="col-md-12">

                                                                                    <label for="contact_address_district" class="mb-2">Chọn Tỉnh/ Thành phố</label>

                                                                                    <input type="text" class="form-control" style="width:150px" name="city1" id="city1" value=" {{$requestInformation->requestInformation->contact_address_city }} ">
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="contact_address_ward" class="mb-2">Chọn Quận/ huyện</label>
                                                                                    <input type="text" class="form-control" style="width:150px" name="district1" id="district1" value=" {{$requestInformation->requestInformation->contact_address_district }} ">

                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="contact_address_street" class="mb-2">Chọn Phường/Xã</label>
                                                                                    <input type="text" class="form-control" style="width:150px" name="ward1" id="ward1" value=" {{$requestInformation->requestInformation->contact_address_ward }} ">

                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="contact_address_street" class="mb-2">Địa Chỉ Chi tiết</label>
                                                                                    <input type="text" id="contact_address_street" class="form-control" style="width:150px" name="contact_address_street" value=" {{$requestInformation->requestInformation->contact_address_street }}   ">
                                                                                    @error('contact_address_street')
                                                                                    <small style="color:red"> Địa chỉ chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror

                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <h3>thông Tin Tra Cứu</h3>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label for="organization_or_individual_name" class="mb-2">Chọn Tỉnh/ Thành phố</label>
                                                                                    <input type="text" id="city2" class="form-control" style="width:150px" name="city2" value=" {{$requestInformation->requestInformation->city }} ">
                                                                                    @error('city')
                                                                                    <small style="color:red"> Địa chỉ chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <label for="organization_or_individual_name" class="mb-2">Chọn Phường/Xã</label>
                                                                                    <input type="text" id="district2" class="form-control" style="width:150px" name="district2" value=" {{$requestInformation->requestInformation->district }} ">

                                                                                    @error('district')
                                                                                    <small style="color:red"> Địa chỉ chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="organization_or_individual_name" class="mb-2">Chọn Phường/Xã</label>
                                                                                    <input type="text" id="ward2" class="form-control" style="width:150px" name="ward2" value=" {{$requestInformation->requestInformation->ward }} ">

                                                                                    @error('ward')
                                                                                    <small style="color:red"> Địa chỉ chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="organization_or_individual_name" class="mb-2">Địa Chỉ Chi tiết</label>
                                                                                    <input type="text" class="form-control" style="width:150px" name="street" id="street" value=" {{$requestInformation->requestInformation->street }} ">

                                                                                    @error('street')
                                                                                    <small style="color:red"> Địa chỉ chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <label for="sheet_number" class="mb-2">Số Tờ:</label>
                                                                                    <input type="text" id="sheet_number" class="form-control" style="width:150px" name="sheet_number" value="{{$requestInformation->requestInformation->sheet_number}}">
                                                                                    @error('sheet_number')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <label for="plot_number" class="mb-2">Số Thửa<a href=""></a>:</label>
                                                                                    <input type="text" id="plot_number" class="form-control" style="width:150px" name="plot_number" value=" {{$requestInformation->requestInformation->plot_number}} ">
                                                                                    @error('plot_number')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red">Số Thửa chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <label for="area_size" class="mb-2">Diện tích<a href=""></a>:</label>
                                                                                    <input type="text" id="area_size" class="form-control" style="width:150px" name="area_size" value="{{$requestInformation->requestInformation->area_size}}">
                                                                                    @error('area_size')
                                                                                    <style>
                                                                                        label {
                                                                                            color: red;
                                                                                        }
                                                                                    </style>
                                                                                    <small style="color:red">Diện tích chưa nhập hoặc có thể nhập sai</small>
                                                                                    @enderror
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">

                                                                            <?php $arr = json_decode($requestInformation->requestInformation->coordinates);
                                                                            $countY = 1;
                                                                            $countX = 1;
                                                                           
                                                                            ?>
                                                                            @foreach ($arr as $item)
                                                                            <div class="col-12 p-3">
                                                                                <label for="sheet_number" class="mb-2">Vị trí Tọa độ X{{$loop->index + 1}}</label>
                                                                                <input type="text" id="sheet_number" class="form-control" style="width:150px" name="coordinatesX[]" value="{{$item->x}}">
                                                                                @error('sheet_number')
                                                                                <style>
                                                                                    label {
                                                                                        color: red;
                                                                                    }
                                                                                </style>
                                                                                <small style="color:red">Vị trí Tọa độ X chưa nhập hoặc có thể nhập sai</small>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-12 p-3">
                                                                                <label for="sheet_number" class="mb-2">Vị trí Tọa độ Y{{$loop->index + 1}}</label>
                                                                                <input type="text" id="sheet_number" class="form-control" style="width:150px" name="coordinatesY[]" value="{{$item->y}}">
                                                                                @error('sheet_number')
                                                                                <style>
                                                                                    label {
                                                                                        color: red;
                                                                                    }
                                                                                </style>
                                                                                <small style="color:red">Số Tờ chưa nhập hoặc có thể nhập sai</small>
                                                                                @enderror
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="col-12 p-3">
                                                                                <label for="sheet_number" style="font-weight:bold; font-size:15px; color:red" class="mb-2">
                                                                                     <?php
                                                                                           $infomation_Check =   $requestInformation->requestInformation->infomation_Check;
                                                                                           if($infomation_Check == 0) {
                                                                                                echo("khách hàng không yêu cầu  bên công ty ký thay");
                                                                                            }else{
                                                                                                echo("khách hàng Ủy quyền ký");
                                                                                            }
                                                                                               
                                                                                        ?>
                                                                                </label>
                                                                                    
                                                                            </div>
                                                                        <div class="row">
                                                                            <div class="col-12 p-3">
                                                                                <label for="image" class="mb-2">Đính kèm hình ảnh chụp</label>
                                                                                <img src="{{ asset('asset/images/') }}/{{$requestInformation->requestInformation->ImageUrl}}" width="200px" height="200px">

                                                                                
                                                                              
                                                                               
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">

                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Cập nhật Thông Tin</button>
                                                                        </div>
                                                                </form>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to delete this post?</h4>
            </div>
            <div class="modal-footer">
                <form action="#" id="delete_form" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="ZfNi7dC5ZD7fdk1hFfREVuDBYTmcOWyywJqOChau">
                    <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Yes, Delete it!">
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
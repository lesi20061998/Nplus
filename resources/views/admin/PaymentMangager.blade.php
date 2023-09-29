@extends('voyager::master');
@section('content')
<div class="container-fluid">
   <h1 class="page-title">
      <i class="voyager-person"></i> Users
   </h1>
   <a href="<?php route('payments.create') ?>" class="btn btn-success btn-add-new">
      <i class="voyager-plus"></i> <span>Add New</span>
   </a>
</div>
<div id="voyager-notifications"></div>
<div class="page-content browse container-fluid">
   <div class="alerts">
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="panel panel-bordered">
            <div class="panel-body">
               <div class="table-responsive">
                  <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                     <div class="row">
                        <div class="col-sm-12">
                           <table id="dataTable" class="table table-hover dataTable no-footer" role="grid" aria-describedby="dataTable_info">
                              <thead>
                                 <tr role="row">
                                    <th class="dt-not-orderable sorting_disabled" rowspan="1" colspan="1" aria-label="
                                       " style="width: 36.575px;">
                                       <input type="checkbox" class="select_all">
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                       Name
                                       : activate to sort column ascending" style="width: 75.3125px;">
                                       Mã Khách Hàng
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                       Email
                                       : activate to sort column ascending" style="width: 174.425px;">
                                       Phương thức Thanh toán
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                       Role
                                       : activate to sort column ascending" style="width: 121.175px;">
                                       Người Thụ lý
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                       Roles
                                       : activate to sort column ascending" style="width: 88.775px;">
                                       Tình Trạng
                                    </th>
                                    <th class="actions text-right dt-not-orderable sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 288.663px;">
                                       Actions
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr role="row" class="odd">
                                    
                                    @foreach($payments as $payment)
                                    <td>
                                       <input type="checkbox" name="row_id" id="checkbox_1" value="1">
                                    </td>
                                    <td>{{ $payment->access_code }}</td>
                                    <td>{{ $payment->order_status }}</td>
                                    <td>{{ $payment->user->name }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                 
                                    <td class="no-sort no-click bread-actions">

                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                          Thông Tin Thụ lý
                                       </button>
                                      
            
                                    </td>
                                 </tr>

                                 <!-- Modal box form -->
                                

                                 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <form>
                                                <div class="container">
                                                   <div class="row">
                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Tên tổ chức /cá nhân đề nghị*</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->organization_or_individual_name}}" style="width:90%" value="">
                                                      </div>
                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Người liên hệ (nếu có): </label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->contact_person}}" style="width:90%" value="">
                                                      </div>
                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Địa chỉ liên hệ:</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->contact_address_street}},{{$payment->requestInformation->contact_address_ward}},{{$payment->requestInformation->contact_address_district}}" style="width:90%" value="">
                                                      </div>
                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Số điện thoại*:</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->phone_number}}" style="width:90%" value="">
                                                      </div>
                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Email*:</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->email}}" style="width:90%" value="">
                                                      </div>

                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Thông tin Tra Cứu</label>
                                                      </div>
                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Địa chỉ*:</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->address}},{{$payment->requestInformation->ward}},{{$payment->requestInformation->district}},{{$payment->requestInformation->ward}}" style="width:90%" value="">
                                                      </div>
                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Số tờ:</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->sheet_number}}" style="width:90%" value="">
                                                      </div>
                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Số Thửa:</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->plot_number}}" style="width:90%" value="">
                                                      </div>
                                                      <div class="form-group  col-md-12 ">
                                                         <label class="control-label" for="name">Số hiệu điểm</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->area_size}}m2" style="width:90%" value="">
                                                      </div>
                                                      
                                                      <div class="form-group  col-md-6">
                                                         <label class="control-label" for="name">Tọa độ X</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->coordinate_x}}" style="width:90%" value="">
                                                      </div>
                                                      <div class="form-group  col-md-6">
                                                         <label class="control-label" for="name">Tọa độ Y</label>
                                                         <input required="" type="text" class="form-control" name="Namme" value="{{$payment->requestInformation->coordinate_y}}" style="width:90%" value="">
                                                      </div>
                                                      
                                                   </div>
                                                </div>

                                             </form>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="button" class="btn btn-primary">  Xuất PDF Hợp đồng </button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @endforeach
                                 </tr>
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

<style>
   .voyager .side-menu.sidebar-inverse {
      top: 0;
   }
</style>

@endsection
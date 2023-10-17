@extends('voyager::master')
@section('content')
<div class="container">
    <h2>List of Request Informations</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Khách Hàng</th>
                <th>Người Thụ Lý</th>
                <th>Trạng Thái</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requestInformations as $requestInformation)
            <tr>
                <td>{{ $requestInformation->payment->access_code }}</td>
                <td>{{ $requestInformation->user->name }}</td>
                <td>{{ $requestInformation->payment->payment_method }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $requestInformation->id }}" data-whatever="@mdo">Xem Thông Tin Thụ Lý</button>
                    <a href="{{ route('request-information.edit', $requestInformation->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('request-information.destroy', $requestInformation->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>

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
                            <form>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>Thông Tin Cá Nhân</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="organization_or_individual_name" class="col-form-label">Tên Tổ Chức/ Hoặc Tư nhân:</label>
                                                <input type="text" class="form-control" value="{{ $requestInformation->organization_or_individual_name }}" id="organization_or_individual_name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_person" class="col-form-label">Họ Và Tên Người Liên Hệ:</label>
                                                <input type="text" class="form-control" value="{{ $requestInformation->contact_person }}" id="contact_person" readonly>
                                            </div>
                                        </div>
                                        <!-- Các trường thông tin cá nhân khác -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
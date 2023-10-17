
@extends('voyager::master')

@section('content')
    <div class="container">
        <h2>Edit Request Information</h2>
        <form method="POST" action="{{ route('request_informations.update', $requestInformation) }}">
            @csrf
            @method('PUT')
            <!-- Hiển thị và chỉnh sửa các trường tương tự như trang tạo mới -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

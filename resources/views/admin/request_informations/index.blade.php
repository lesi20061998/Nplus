@extends('voyager::master');

@section('content')
    <div class="container">
        <h2>List of Request Informations</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Organization/Individual Name</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Access Code</th>
                    <th>Order Status</th>
                    <th>Payment Method</th>
                    <th>User Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th> <!-- Thêm cột Actions -->
                </tr>
            </thead>
            <tbody>
                @foreach ($requestInformations as $requestInformation)
                    <tr>
                        <td>{{ $requestInformation->organization_or_individual_name }}</td>
                        <td>{{ $requestInformation->contact_person }}</td>
                        <td>{{ $requestInformation->email }}</td>
                        <td>{{ $requestInformation->payment->access_code }}</td>
                        <td>{{ $requestInformation->payment->order_status }}</td>
                        <td>{{ $requestInformation->payment->payment_method }}</td>
                        <td>{{ $requestInformation->payment->user->name }}</td>
                        <td>{{ $requestInformation->created_at }}</td>
                        <td>{{ $requestInformation->updated_at }}</td>
                        <td>
                            <a href="{{ route('request_informations.edit', $requestInformation) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('request_informations.destroy', $requestInformation) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

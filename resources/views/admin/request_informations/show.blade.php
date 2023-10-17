<!-- resources/views/request_informations/show.blade.php -->
@extends('voyager::master');

@section('content')
    <div class="container">
        <h2>Request Information Details</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>Organization/Individual Name:</th>
                    <td>{{ $requestInformation->organization_or_individual_name }}</td>
                </tr>
                <!-- Hiển thị các trường khác tại đây -->
            </tbody>
        </table>
        <a href="{{ route('request_informations.edit', $requestInformation) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('request_informations.destroy', $requestInformation) }}" method="POST" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
        </form>
    </div>
@endsection

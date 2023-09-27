

<table>
    <thead>
        <tr>
            <th>Payment ID</th>
            <th>Access Code</th>
            <th>Order Status</th>
            <th>Payment Method</th>
            <th>User Name</th>
        </tr>
    </thead>
    <tbody>
     
        @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->payment_id }}</td>
            <td>{{ $payment->access_code }}</td>
            <td>{{ $payment->order_status }}</td>
            <td>{{ $payment->payment_method }}</td>
            <td>{{ $payment->user->name }}</td>
            <td>{{ $payment->requestInformation->organization_or_individual_name}}</td>
            <td>{{ $payment->requestInformation->contact_person}}</td>
           
            <!-- Add more fields from the request_information as needed -->
        </tr>
        @endforeach
    </tbody>
</table>
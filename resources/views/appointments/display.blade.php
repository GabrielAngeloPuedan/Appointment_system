<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queueing Appointment System - Display</title>
</head>
<body>
    <h1>Appointments</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Queueing Number</th>
                <th>Concern</th>
                <th>Service Type</th>
                <th>Appointment Date</th>
                <th>Status</th>
                {{-- <th>Last Name</th>
                <th>First Name</th>
                <th>Address</th>
                <th>Contact Number</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ sprintf('%02d%02d-%03d', substr($appointment->appointment_date, 5, 2), substr($appointment->appointment_date, 8, 2), $appointment->queue_number) }}</td>
                    <td>{{ $appointment->concern }}</td>
                    <td>{{ $appointment->service_type }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td></td>
                    {{-- <td>{{ $appointment->last_name }}</td>
                    <td>{{ $appointment->first_name }}</td>
                    <td>{{ $appointment->address }}</td>
                    <td>{{ $appointment->contact_number }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

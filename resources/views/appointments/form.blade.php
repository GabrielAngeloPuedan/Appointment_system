<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queueing Appointment System</title>
</head>
<body>
    <h1>Book Appointment</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('appointments.book') }}" method="POST">
        @csrf

        <label for="service_type">Service Type:</label>
        <select name="service_type" id="service_type">
            @foreach ($serviceTypes as $type)
                <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>
        <br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" name="appointment_date" id="appointment_date" required>
        <br>

        <button type="submit">Book Appointment</button>
    </form>
</body>
</html>

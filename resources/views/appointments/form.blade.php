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

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required>
        <br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required>
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>
        <br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" id="contact_number" required>
        <br>

        <label for="concern">Concern:</label>
        <textarea name="concern" id="concern" rows="4" required></textarea>
        <br>

        <button type="submit">Book Appointment</button>
    </form>
</body>
</html>

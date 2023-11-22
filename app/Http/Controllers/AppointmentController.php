<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;


class AppointmentController extends Controller
{
    public function showForm()
    {
        // You can retrieve service types from a database or define them here
        $serviceTypes = [
            'For Kids',
            'For Adults',
            'For Pre-natal',
            'For Senior Citizen',
            'For PWD',
            'For Dental Checkup',
        ];

        return view('appointments.form', compact('serviceTypes'));
    }

    public function bookAppointment(Request $request)
    {
        $request->validate([
            'service_type' => 'required|in:For Kids,For Adults,For Pre-natal,For Senior Citizen,For PWD,For Dental Checkup',
            'appointment_date' => 'required|date',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'address' => 'required|string',
            'contact_number' => 'required|string',
            'concern' => 'required|string',
        ]);

        $serviceType = $request->input('service_type');
        $appointmentDate = Carbon::parse($request->input('appointment_date'));
        $formattedDate = $appointmentDate->format('md');

        $queueNumber = Appointment::whereDate('appointment_date', $appointmentDate)
            ->where('service_type', $serviceType)
            ->count() + 1;

            $appointment = Appointment::create([
                'service_type' => $serviceType,
                'appointment_date' => $appointmentDate,
                'queue_number' => $queueNumber,
                'last_name' => $request->input('last_name'),
                'first_name' => $request->input('first_name'),
                'address' => $request->input('address'),
                'contact_number' => $request->input('contact_number'),
                'concern' => $request->input('concern'),
            ]);

        $formattedQueueNumber = $formattedDate . '-' . str_pad($queueNumber, 3, '0', STR_PAD_LEFT);

        return redirect()->route('appointments.form')->with('success', "Appointment booked! Queue Number: $formattedQueueNumber");
    }

    public function displayAppointments()
{
    // Retrieve all appointments from the database
    $appointments = Appointment::all();

    return view('appointments.display', compact('appointments'));
}
}

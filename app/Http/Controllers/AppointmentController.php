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
        $serviceTypes = ['For Kids', 'For Adults'];

        return view('appointments.form', compact('serviceTypes'));
    }

    public function bookAppointment(Request $request)
    {
        $request->validate([
            'service_type' => 'required|in:For Kids,For Adults',
            'appointment_date' => 'required|date',
        ]);

        $serviceType = $request->input('service_type');
        $appointmentDate = Carbon::parse($request->input('appointment_date'));
        $formattedDate = $appointmentDate->format('md');

        $queueNumber = Appointment::whereDate('appointment_date', $appointmentDate)
            ->where('service_type', $serviceType)
            ->count() + 1;

        Appointment::create([
            'service_type' => $serviceType,
            'appointment_date' => $appointmentDate,
            'queue_number' => $queueNumber,
        ]);

        $formattedQueueNumber = $formattedDate . '-' . str_pad($queueNumber, 3, '0', STR_PAD_LEFT);

        return redirect()->route('appointments.form')->with('success', "Appointment booked! Queue Number: $formattedQueueNumber");
    }
}


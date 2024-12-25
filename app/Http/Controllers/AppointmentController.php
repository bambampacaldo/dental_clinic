<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient', 'user'])
            ->orderBy('appointment_datetime')
            ->get();
        
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        $timeSlots = $this->generateTimeSlots();
        return view('appointments.create', compact('patients', 'timeSlots'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'reason_for_visit' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $appointmentDateTime = Carbon::parse($validated['appointment_date'] . ' ' . $validated['appointment_time']);

        Appointment::create([
            'patient_id' => $validated['patient_id'],
            'user_id' => auth()->id(),
            'appointment_datetime' => $appointmentDateTime,
            'reason_for_visit' => $validated['reason_for_visit'],
            'notes' => $validated['notes'],
            'status' => 'scheduled'
        ]);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment scheduled successfully');
    }

    public function updateStatus(Appointment $appointment, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:scheduled,completed,cancelled'
        ]);

        $appointment->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Appointment status updated');
    }

    private function generateTimeSlots()
    {
        $slots = [];
        $start = Carbon::createFromTime(9, 0); // 9 AM
        $end = Carbon::createFromTime(17, 0);  // 5 PM
        
        while ($start <= $end) {
            $slots[] = $start->format('H:i');
            $start->addMinutes(30);
        }
        
        return $slots;
    }
}

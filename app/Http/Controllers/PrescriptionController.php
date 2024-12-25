<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Patient;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with(['patient'])
            ->latest()
            ->get();
        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('prescriptions.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'treatment_id' => 'nullable|string',
            'medication_name' => 'required|string',
            'dosage' => 'required|string',
            'frequency' => 'required|string',
            'duration_days' => 'required|integer|min:1',
            'instructions' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Prescription::create($validated);

        return redirect()->route('prescriptions.index')
            ->with('success', 'Prescription created successfully');
    }

    public function show(Prescription $prescription)
    {
        return view('prescriptions.show', compact('prescription'));
    }

    public function updateStatus(Prescription $prescription, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,completed,cancelled'
        ]);

        $prescription->update($validated);

        return redirect()->back()->with('success', 'Prescription status updated');
    }
}

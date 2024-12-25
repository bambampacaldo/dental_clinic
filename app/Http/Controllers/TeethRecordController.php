<?php

namespace App\Http\Controllers;

use App\Models\TeethRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class TeethRecordController extends Controller
{
    public function index()
    {
        $patients = Patient::with('teethRecords')->get();
        return view('teeth-records.index', compact('patients'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('teeth-records.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'tooth_number' => 'required|string',
            'condition' => 'required|string',
            'procedure_done' => 'nullable|string',
            'notes' => 'nullable|string',
            'procedure_date' => 'nullable|date',
            'cost' => 'nullable|numeric|min:0',
            'status' => 'required|in:healthy,needs_treatment,under_treatment,treated'
        ]);

        TeethRecord::create($validated);

        return redirect()->route('teeth-records.index')
            ->with('success', 'Teeth record created successfully');
    }

    public function show(Patient $patient)
    {
        $patient->load('teethRecords');
        return view('teeth-records.show', compact('patient'));
    }

    public function edit(TeethRecord $teethRecord)
    {
        return view('teeth-records.edit', compact('teethRecord'));
    }

    public function update(Request $request, TeethRecord $teethRecord)
    {
        $validated = $request->validate([
            'condition' => 'required|string',
            'procedure_done' => 'nullable|string',
            'notes' => 'nullable|string',
            'procedure_date' => 'nullable|date',
            'cost' => 'nullable|numeric|min:0',
            'status' => 'required|in:healthy,needs_treatment,under_treatment,treated'
        ]);

        $teethRecord->update($validated);

        return redirect()->route('teeth-records.show', $teethRecord->patient_id)
            ->with('success', 'Teeth record updated successfully');
    }
}

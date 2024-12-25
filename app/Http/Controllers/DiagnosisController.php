<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\Patient;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    public function index()
    {
        $treatments = Treatment::with(['patient'])
            ->latest()
            ->get();
        return view('diagnosis.index', compact('treatments'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('diagnosis.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'treatment_type' => 'required|string',
            'tooth_number' => 'nullable|string',
            'description' => 'required|string',
            'cost' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        Treatment::create($validated);

        return redirect()->route('diagnosis.index')
            ->with('success', 'Treatment record created successfully');
    }

    public function show(Treatment $treatment)
    {
        $treatment->load(['patient', 'prescriptions']);
        return view('diagnosis.show', compact('treatment'));
    }
} 
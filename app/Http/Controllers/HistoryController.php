<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Treatment;
use App\Models\Appointment;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $patients = Patient::with(['treatments', 'appointments'])
            ->latest()
            ->get();
            
        return view('history.index', compact('patients'));
    }

    public function show(Patient $patient)
    {
        $patient->load(['treatments', 'appointments', 'prescriptions', 'medicalHistory']);
        
        return view('history.show', compact('patient'));
    }
} 
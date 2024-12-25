<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'treatment_id',
        'medication_name',
        'dosage',
        'frequency',
        'duration_days',
        'instructions',
        'notes',
        'prescribing_doctor',
        'prescription_date',
        'prescription_time',
        'pharmacy_notes',
        'route',
        'status',
        'is_controlled_substance',
        'refills_allowed'
    ];

    protected $casts = [
        'prescription_date' => 'date',
        'prescription_time' => 'datetime',
        'is_controlled_substance' => 'boolean'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
} 
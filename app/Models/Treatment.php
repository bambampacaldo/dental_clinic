<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'appointment_id',
        'treatment_type',
        'tooth_number',
        'chief_complaint',
        'diagnosis',
        'treatment_plan',
        'description',
        'status',
        'cost',
        'paid_amount',
        'notes',
        'medications',
        'complications',
        'next_visit'
    ];

    protected $casts = [
        'next_visit' => 'date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function getRemainingBalanceAttribute()
    {
        return $this->cost - $this->paid_amount;
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
} 
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'address',
        'emergency_contact_name',
        'emergency_contact_phone'
    ];

    protected $casts = [
        'date_of_birth' => 'date'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class);
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function teethRecords()
    {
        return $this->hasMany(TeethRecord::class);
    }
} 
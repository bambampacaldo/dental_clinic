<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeethRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'tooth_number',
        'condition',
        'procedure_done',
        'notes',
        'procedure_date',
        'cost',
        'status'
    ];

    protected $casts = [
        'procedure_date' => 'date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
} 
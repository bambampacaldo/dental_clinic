<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\TeethRecordController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DiagnosisController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Appointments
    Route::resource('appointments', AppointmentController::class);
    
    // Patients
    Route::resource('patients', PatientController::class);
    
    // Medical History
    Route::resource('medical-histories', MedicalHistoryController::class);
    
    // Treatments/Diagnosis
    Route::resource('treatments', TreatmentController::class);
    
    // Prescriptions
    Route::resource('prescriptions', PrescriptionController::class);
    
    // Teeth Registry
    Route::resource('teeth-records', TeethRecordController::class);
    
    // Add this inside your auth middleware group
    Route::patch('/appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])
        ->name('appointments.updateStatus');
    
    // Add these routes inside your auth middleware group
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/history/{patient}', [HistoryController::class, 'show'])->name('history.show');
    
    // Add these routes inside your auth middleware group
    Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');
    Route::get('/diagnosis/create', [DiagnosisController::class, 'create'])->name('diagnosis.create');
    Route::post('/diagnosis', [DiagnosisController::class, 'store'])->name('diagnosis.store');
    Route::get('/diagnosis/{treatment}', [DiagnosisController::class, 'show'])->name('diagnosis.show');
    
    // Add these routes inside your auth middleware group
    Route::get('/prescriptions', [PrescriptionController::class, 'index'])->name('prescriptions.index');
    Route::get('/prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.create');
    Route::post('/prescriptions', [PrescriptionController::class, 'store'])->name('prescriptions.store');
    Route::get('/prescriptions/{prescription}', [PrescriptionController::class, 'show'])->name('prescriptions.show');
    Route::patch('/prescriptions/{prescription}/status', [PrescriptionController::class, 'updateStatus'])
        ->name('prescriptions.updateStatus');
});

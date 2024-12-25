@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Patient Details</h5>
                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Edit Patient</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Personal Information</h6>
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth:</th>
                                    <td>{{ $patient->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <th>Gender:</th>
                                    <td>{{ $patient->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $patient->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $patient->email ?? 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $patient->address }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Emergency Contact</h6>
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $patient->emergency_contact_name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $patient->emergency_contact_phone }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Appointments Section -->
                    <div class="mt-4">
                        <h6>Appointments</h6>
                        @if($patient->appointments && $patient->appointments->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patient->appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->appointment_datetime->format('Y-m-d') }}</td>
                                            <td>{{ $appointment->appointment_datetime->format('H:i') }}</td>
                                            <td>{{ $appointment->reason_for_visit }}</td>
                                            <td>{{ ucfirst($appointment->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No appointments found.</p>
                        @endif
                    </div>

                    <!-- Treatments Section -->
                    <div class="mt-4">
                        <h6>Treatment History</h6>
                        @if($patient->treatments && $patient->treatments->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patient->treatments as $treatment)
                                        <tr>
                                            <td>{{ $treatment->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $treatment->treatment_type }}</td>
                                            <td>{{ $treatment->description }}</td>
                                            <td>${{ number_format($treatment->cost, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No treatments found.</p>
                        @endif
                    </div>

                    <!-- Prescriptions Section -->
                    <div class="mt-4">
                        <h6>Prescriptions</h6>
                        @if($patient->prescriptions && $patient->prescriptions->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Medication</th>
                                        <th>Dosage</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patient->prescriptions as $prescription)
                                        <tr>
                                            <td>{{ $prescription->prescribed_at }}</td>
                                            <td>{{ $prescription->medication_name }}</td>
                                            <td>{{ $prescription->dosage }}</td>
                                            <td>{{ ucfirst($prescription->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No prescriptions found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
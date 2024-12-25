<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient History - {{ $patient->first_name }} {{ $patient->last_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="mb-4">
            <h2>Patient History: {{ $patient->first_name }} {{ $patient->last_name }}</h2>
            <p class="text-muted">
                Date of Birth: {{ $patient->date_of_birth->format('M d, Y') }} 
                ({{ $patient->date_of_birth->age }} years old)
            </p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Medical History</h5>
                    </div>
                    <div class="card-body">
                        @if($patient->medicalHistory)
                            <ul class="list-unstyled">
                                <li>
                                    <i class='bx bx-heart {{ $patient->medicalHistory->heart_disease ? "text-danger" : "text-success" }}'></i>
                                    Heart Disease: {{ $patient->medicalHistory->heart_disease ? 'Yes' : 'No' }}
                                </li>
                                <li>
                                    <i class='bx bx-plus-medical {{ $patient->medicalHistory->diabetes ? "text-danger" : "text-success" }}'></i>
                                    Diabetes: {{ $patient->medicalHistory->diabetes ? 'Yes' : 'No' }}
                                </li>
                                <li>
                                    <i class='bx bx-pulse {{ $patient->medicalHistory->high_blood_pressure ? "text-danger" : "text-success" }}'></i>
                                    High Blood Pressure: {{ $patient->medicalHistory->high_blood_pressure ? 'Yes' : 'No' }}
                                </li>
                                @if($patient->medicalHistory->allergies)
                                    <li class="mt-2">
                                        <strong>Allergies:</strong><br>
                                        {{ $patient->medicalHistory->allergies_description }}
                                    </li>
                                @endif
                            </ul>
                        @else
                            <p class="text-muted">No medical history recorded</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Treatment History</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Treatment</th>
                                        <th>Tooth</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($patient->treatments as $treatment)
                                        <tr>
                                            <td>{{ $treatment->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <strong>{{ $treatment->treatment_type }}</strong><br>
                                                <small class="text-muted">{{ $treatment->description }}</small>
                                            </td>
                                            <td>{{ $treatment->tooth_number ?? 'N/A' }}</td>
                                            <td>₱{{ number_format($treatment->cost, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No treatments recorded</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Prescription History</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Medication</th>
                                        <th>Dosage</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($patient->prescriptions as $prescription)
                                        <tr>
                                            <td>{{ $prescription->created_at->format('M d, Y') }}</td>
                                            <td>{{ $prescription->medication_name }}</td>
                                            <td>{{ $prescription->dosage }} - {{ $prescription->frequency }}</td>
                                            <td>{{ $prescription->duration_days }} days</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No prescriptions recorded</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('history.index') }}" class="btn btn-secondary">
                <i class='bx bx-arrow-back'></i> Back to History List
            </a>
        </div>
    </div>
</body>
</html> 
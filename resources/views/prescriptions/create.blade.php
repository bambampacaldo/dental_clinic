<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Prescription - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">Create New Prescription</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('prescriptions.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="patient_id" class="form-label">Patient</label>
                                <select name="patient_id" id="patient_id" class="form-select" required>
                                    <option value="">Select Patient</option>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}">
                                            {{ $patient->first_name }} {{ $patient->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="treatment_id" class="form-label">Related Treatment (Optional)</label>
                                <input type="text" class="form-control" id="treatment_id" 
                                       name="treatment_id" value="{{ old('treatment_id') }}"
                                       placeholder="Enter treatment details">
                            </div>

                            <div class="mb-3">
                                <label for="medication_name" class="form-label">Medication Name</label>
                                <input type="text" class="form-control" id="medication_name" 
                                       name="medication_name" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dosage" class="form-label">Dosage</label>
                                    <input type="text" class="form-control" id="dosage" 
                                           name="dosage" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="frequency" class="form-label">Frequency</label>
                                    <input type="text" class="form-control" id="frequency" 
                                           name="frequency" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="duration_days" class="form-label">Duration (Days)</label>
                                <input type="number" class="form-control" id="duration_days" 
                                       name="duration_days" min="1" required>
                            </div>

                            <div class="mb-3">
                                <label for="instructions" class="form-label">Instructions</label>
                                <textarea class="form-control" id="instructions" name="instructions" 
                                          rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Additional Notes</label>
                                <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Create Prescription</button>
                                <a href="{{ route('prescriptions.index') }}" 
                                   class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 
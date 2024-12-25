<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Diagnosis - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">New Diagnosis & Treatment</h3>
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

                        <form action="{{ route('diagnosis.store') }}" method="POST">
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

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="treatment_type" class="form-label">Treatment Type</label>
                                    <select name="treatment_type" id="treatment_type" class="form-select" required>
                                        <option value="">Select Treatment</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Extraction">Extraction</option>
                                        <option value="Filling">Filling</option>
                                        <option value="Root Canal">Root Canal</option>
                                        <option value="Crown">Crown</option>
                                        <option value="Braces">Braces</option>
                                        <option value="Whitening">Whitening</option>
                                        <option value="Check-up">Check-up</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tooth_number" class="form-label">Tooth Number (Optional)</label>
                                    <input type="text" class="form-control" id="tooth_number" name="tooth_number">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description/Diagnosis</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cost" class="form-label">Cost (₱)</label>
                                    <input type="number" class="form-control" id="cost" name="cost" step="0.01" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Additional Notes</label>
                                <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Save Diagnosis</button>
                                <a href="{{ route('diagnosis.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 
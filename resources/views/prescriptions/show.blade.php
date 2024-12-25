<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Details - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Prescription Details</h3>
                        <span class="badge bg-{{ $prescription->status === 'active' ? 'success' : ($prescription->status === 'completed' ? 'info' : 'danger') }}">
                            {{ ucfirst($prescription->status) }}
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5>Patient Information</h5>
                                <p class="mb-1"><strong>Name:</strong> {{ $prescription->patient->first_name }} {{ $prescription->patient->last_name }}</p>
                                <p class="mb-1"><strong>Date:</strong> {{ $prescription->created_at->format('M d, Y') }}</p>
                                @if($prescription->treatment_id)
                                    <p class="mb-1"><strong>Treatment:</strong> {{ $prescription->treatment_id }}</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h5>Prescription Details</h5>
                                <p class="mb-1"><strong>Medication:</strong> {{ $prescription->medication_name }}</p>
                                <p class="mb-1"><strong>Dosage:</strong> {{ $prescription->dosage }}</p>
                                <p class="mb-1"><strong>Frequency:</strong> {{ $prescription->frequency }}</p>
                                <p class="mb-1"><strong>Duration:</strong> {{ $prescription->duration_days }} days</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5>Instructions</h5>
                            <p class="mb-3">{{ $prescription->instructions }}</p>
                        </div>

                        @if($prescription->notes)
                            <div class="mb-4">
                                <h5>Additional Notes</h5>
                                <p class="mb-3">{{ $prescription->notes }}</p>
                            </div>
                        @endif

                        @if($prescription->prescribing_doctor)
                            <div class="mb-4">
                                <h5>Prescribing Doctor</h5>
                                <p>{{ $prescription->prescribing_doctor }}</p>
                            </div>
                        @endif

                        @if($prescription->pharmacy_notes)
                            <div class="mb-4">
                                <h5>Pharmacy Notes</h5>
                                <p>{{ $prescription->pharmacy_notes }}</p>
                            </div>
                        @endif

                        <div class="mb-4">
                            <h5>Additional Information</h5>
                            <p class="mb-1"><strong>Route:</strong> {{ ucfirst($prescription->route) }}</p>
                            @if($prescription->is_controlled_substance)
                                <p class="mb-1"><strong>Controlled Substance:</strong> Yes</p>
                            @endif
                            @if($prescription->refills_allowed > 0)
                                <p class="mb-1"><strong>Refills Allowed:</strong> {{ $prescription->refills_allowed }}</p>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">
                                <i class='bx bx-arrow-back'></i> Back to List
                            </a>
                            <div>
                                <form action="{{ route('prescriptions.updateStatus', $prescription) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm d-inline-block w-auto me-2" 
                                            onchange="this.form.submit()">
                                        <option value="active" {{ $prescription->status === 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="completed" {{ $prescription->status === 'completed' ? 'selected' : '' }}>
                                            Completed
                                        </option>
                                        <option value="cancelled" {{ $prescription->status === 'cancelled' ? 'selected' : '' }}>
                                            Cancelled
                                        </option>
                                    </select>
                                </form>
                                <button onclick="window.print()" class="btn btn-info">
                                    <i class='bx bx-printer'></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 
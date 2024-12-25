<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescriptions - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Prescriptions</h2>
            <a href="{{ route('prescriptions.create') }}" class="btn btn-primary">
                <i class='bx bx-plus'></i> New Prescription
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Patient</th>
                                <th>Medication</th>
                                <th>Dosage</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prescriptions as $prescription)
                                <tr>
                                    <td>{{ $prescription->created_at->format('M d, Y') }}</td>
                                    <td>{{ $prescription->patient->first_name }} {{ $prescription->patient->last_name }}</td>
                                    <td>{{ $prescription->medication_name }}</td>
                                    <td>{{ $prescription->dosage }} - {{ $prescription->frequency }}</td>
                                    <td>{{ $prescription->duration_days }} days</td>
                                    <td>
                                        <span class="badge bg-{{ $prescription->status === 'active' ? 'success' : ($prescription->status === 'completed' ? 'info' : 'danger') }}">
                                            {{ ucfirst($prescription->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('prescriptions.show', $prescription) }}" 
                                               class="btn btn-sm btn-info me-2">
                                                <i class='bx bx-show'></i>
                                            </a>
                                            <form action="{{ route('prescriptions.updateStatus', $prescription) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-select form-select-sm" 
                                                        onchange="this.form.submit()">
                                                    <option value="active" 
                                                            {{ $prescription->status === 'active' ? 'selected' : '' }}>
                                                        Active
                                                    </option>
                                                    <option value="completed" 
                                                            {{ $prescription->status === 'completed' ? 'selected' : '' }}>
                                                        Completed
                                                    </option>
                                                    <option value="cancelled" 
                                                            {{ $prescription->status === 'cancelled' ? 'selected' : '' }}>
                                                        Cancelled
                                                    </option>
                                                </select>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 
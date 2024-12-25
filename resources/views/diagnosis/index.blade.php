<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis & Treatments - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Diagnosis & Treatments</h2>
            <a href="{{ route('diagnosis.create') }}" class="btn btn-primary">
                <i class='bx bx-plus'></i> New Diagnosis
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
                                <th>Treatment</th>
                                <th>Tooth No.</th>
                                <th>Cost</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($treatments as $treatment)
                                <tr>
                                    <td>{{ $treatment->created_at->format('M d, Y') }}</td>
                                    <td>{{ $treatment->patient->first_name }} {{ $treatment->patient->last_name }}</td>
                                    <td>
                                        <strong>{{ $treatment->treatment_type }}</strong><br>
                                        <small class="text-muted">{{ Str::limit($treatment->description, 50) }}</small>
                                    </td>
                                    <td>{{ $treatment->tooth_number ?? 'N/A' }}</td>
                                    <td>₱{{ number_format($treatment->cost, 2) }}</td>
                                    <td>
                                        <a href="{{ route('diagnosis.show', $treatment) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class='bx bx-show'></i>
                                        </a>
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
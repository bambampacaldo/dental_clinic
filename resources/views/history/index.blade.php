<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient History - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Patient History Records</h2>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Last Visit</th>
                                <th>Total Visits</th>
                                <th>Total Treatments</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                    <td>
                                        {{ $patient->appointments->sortByDesc('appointment_datetime')->first()?->appointment_datetime->format('M d, Y') ?? 'No visits' }}
                                    </td>
                                    <td>{{ $patient->appointments->count() }}</td>
                                    <td>{{ $patient->treatments->count() }}</td>
                                    <td>
                                        <a href="{{ route('history.show', $patient) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class='bx bx-history'></i> View History
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
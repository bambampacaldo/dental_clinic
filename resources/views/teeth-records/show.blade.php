<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Chart - {{ $patient->first_name }} {{ $patient->last_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <style>
        .tooth-chart {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 10px;
            margin: 20px 0;
        }
        .tooth {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }
        .tooth.healthy { background-color: #d4edda; }
        .tooth.needs_treatment { background-color: #fff3cd; }
        .tooth.under_treatment { background-color: #cce5ff; }
        .tooth.treated { background-color: #e2e3e5; }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="mb-4">
            <h2>Dental Chart: {{ $patient->first_name }} {{ $patient->last_name }}</h2>
            <p class="text-muted">Last Updated: {{ $patient->teethRecords->sortByDesc('updated_at')->first()?->updated_at->format('M d, Y h:i A') ?? 'No records' }}</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <h4>Upper Teeth</h4>
                <div class="tooth-chart">
                    @for($i = 18; $i >= 11; $i--)
                        @php
                            $record = $patient->teethRecords->where('tooth_number', $i)->first();
                        @endphp
                        <div class="tooth {{ $record?->status ?? 'healthy' }}">
                            <strong>#{{ $i }}</strong>
                            @if($record)
                                <br>
                                <small>{{ $record->condition }}</small>
                            @endif
                        </div>
                    @endfor
                    @for($i = 21; $i <= 28; $i++)
                        @php
                            $record = $patient->teethRecords->where('tooth_number', $i)->first();
                        @endphp
                        <div class="tooth {{ $record?->status ?? 'healthy' }}">
                            <strong>#{{ $i }}</strong>
                            @if($record)
                                <br>
                                <small>{{ $record->condition }}</small>
                            @endif
                        </div>
                    @endfor
                </div>

                <h4>Lower Teeth</h4>
                <div class="tooth-chart">
                    @for($i = 48; $i >= 41; $i--)
                        @php
                            $record = $patient->teethRecords->where('tooth_number', $i)->first();
                        @endphp
                        <div class="tooth {{ $record?->status ?? 'healthy' }}">
                            <strong>#{{ $i }}</strong>
                            @if($record)
                                <br>
                                <small>{{ $record->condition }}</small>
                            @endif
                        </div>
                    @endfor
                    @for($i = 31; $i <= 38; $i++)
                        @php
                            $record = $patient->teethRecords->where('tooth_number', $i)->first();
                        @endphp
                        <div class="tooth {{ $record?->status ?? 'healthy' }}">
                            <strong>#{{ $i }}</strong>
                            @if($record)
                                <br>
                                <small>{{ $record->condition }}</small>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Treatment History</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tooth #</th>
                                <th>Condition</th>
                                <th>Procedure</th>
                                <th>Date</th>
                                <th>Cost</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patient->teethRecords->sortByDesc('procedure_date') as $record)
                                <tr>
                                    <td>#{{ $record->tooth_number }}</td>
                                    <td>{{ $record->condition }}</td>
                                    <td>{{ $record->procedure_done ?? 'N/A' }}</td>
                                    <td>{{ $record->procedure_date?->format('M d, Y') ?? 'N/A' }}</td>
                                    <td>{{ $record->cost ? '₱' . number_format($record->cost, 2) : 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ 
                                            $record->status === 'healthy' ? 'success' : 
                                            ($record->status === 'needs_treatment' ? 'warning' : 
                                            ($record->status === 'under_treatment' ? 'info' : 'secondary')) 
                                        }}">
                                            {{ str_replace('_', ' ', ucfirst($record->status)) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('teeth-records.index') }}" class="btn btn-secondary">
                <i class='bx bx-arrow-back'></i> Back to Registry
            </a>
        </div>
    </div>
</body>
</html> 
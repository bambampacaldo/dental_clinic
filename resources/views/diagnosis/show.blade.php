@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Treatment Details</h5>
                    <div>
                        <a href="{{ route('diagnosis.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>Patient Name:</th>
                                    <td>{{ $treatment->patient->first_name }} {{ $treatment->patient->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Treatment Type:</th>
                                    <td>{{ $treatment->treatment_type }}</td>
                                </tr>
                                <tr>
                                    <th>Tooth Number:</th>
                                    <td>{{ $treatment->tooth_number ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $treatment->description }}</td>
                                </tr>
                                <tr>
                                    <th>Cost:</th>
                                    <td>${{ number_format($treatment->cost, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Notes:</th>
                                    <td>{{ $treatment->notes ?? 'No notes available' }}</td>
                                </tr>
                                <tr>
                                    <th>Created At:</th>
                                    <td>{{ $treatment->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    @if($treatment->prescriptions && $treatment->prescriptions->count() > 0)
                    <div class="mt-4">
                        <h6>Related Prescriptions</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Medication</th>
                                    <th>Dosage</th>
                                    <th>Frequency</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($treatment->prescriptions as $prescription)
                                <tr>
                                    <td>{{ $prescription->medication_name }}</td>
                                    <td>{{ $prescription->dosage }}</td>
                                    <td>{{ $prescription->frequency }}</td>
                                    <td>{{ $prescription->duration_days }} days</td>
                                    <td>{{ ucfirst($prescription->status) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
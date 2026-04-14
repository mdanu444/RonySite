@extends('layout')

@section('title', 'Visa Details')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="mb-0"><i class="fas fa-file-contract"></i> Visa Details</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('visas.edit', $visa) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('visas.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Visa Photo -->
        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    @if($visa->photo_path)
                        <img src="{{ asset('storage/' . $visa->photo_path) }}" alt="Visa Photo" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                    @else
                        <div style="height: 300px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-image" style="font-size: 100px; color: #ccc;"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Details -->
        <div class="col-md-9 mb-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-passport"></i> Visa Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">Visa Number</label>
                            <p class="h6"><strong>{{ $visa->visa_number }}</strong></p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Visa Type</label>
                            <p class="h6">{{ $visa->visa_type }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">Visa Status</label>
                            <p class="h6">
                                <span class="badge bg-{{ $visa->visa_status == 'Active' ? 'success' : ($visa->visa_status == 'Expired' ? 'danger' : ($visa->visa_status == 'Pending' ? 'warning' : 'secondary')) }}">
                                    {{ $visa->visa_status }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Visa Validity Date</label>
                            <p class="h6">{{ $visa->visa_validity->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-muted">Purpose of Visit</label>
                            <p class="h6">{{ $visa->visit_purpose }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-user-tie"></i> Personal Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">First Name</label>
                            <p class="h6">{{ $visa->firstname }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Surname</label>
                            <p class="h6">{{ $visa->surname ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">Date of Birth</label>
                            <p class="h6">{{ $visa->date_of_birth ? $visa->date_of_birth->format('d.m.Y') : 'Not available' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Citizenship</label>
                            <p class="h6">{{ $visa->citizenship }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-muted">Passport Number</label>
                            <p class="h6">{{ $visa->passport_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Additional Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">Created At</label>
                            <p class="h6">{{ $visa->created_at ? $visa->created_at->format('d/m/Y H:i') : 'Not available' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Last Updated</label>
                            <p class="h6">{{ $visa->updated_at ? $visa->updated_at->format('d/m/Y H:i') : 'Not available' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="d-flex gap-2">
                <a href="{{ route('visas.edit', $visa) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit Visa
                </a>
                <form method="POST" action="{{ route('visas.destroy', $visa) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this visa?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete Visa
                    </button>
                </form>
                <a href="{{ route('visas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

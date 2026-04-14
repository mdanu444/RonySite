@extends('layout')

@section('title', 'Add New Visa')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="mb-4"><i class="fas fa-file-plus"></i> Add New Visa</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('visas.store') }}" enctype="multipart/form-data">
                        @csrf

                        <h5 class="mb-3 pb-2 border-bottom"><i class="fas fa-passport"></i> Visa Information</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="visa_number" class="form-label">Visa Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('visa_number') is-invalid @enderror" id="visa_number" name="visa_number" value="{{ old('visa_number') }}" required>
                                @error('visa_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="visa_type" class="form-label">Visa Type <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('visa_type') is-invalid @enderror" id="visa_type" name="visa_type" value="{{ old('visa_type') }}" required placeholder="e.g., Tourist, Business, Student">
                                @error('visa_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="visa_status" class="form-label">Visa Status <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('visa_status') is-invalid @enderror" id="visa_status" name="visa_status" value="{{ old('visa_status') }}" required placeholder="e.g., Active, Pending, Expired">
                                @error('visa_status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="visa_validity" class="form-label">Visa Validity (mm/dd/yyyy) <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('visa_validity') is-invalid @enderror" id="visa_validity" name="visa_validity" value="{{ old('visa_validity') }}" required>
                                @error('visa_validity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="visit_purpose" class="form-label">Purpose of Visit <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('visit_purpose') is-invalid @enderror" id="visit_purpose" name="visit_purpose" value="{{ old('visit_purpose') }}" required placeholder="e.g., Tourism, Business Meeting">
                            @error('visit_purpose')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <h5 class="mb-3 pb-2 border-bottom mt-4"><i class="fas fa-user-tie"></i> Personal Information</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
                                @error('firstname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old('surname') }}">
                                @error('surname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth (mm/dd/yyyy) <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                @error('date_of_birth')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="citizenship" class="form-label">Citizenship <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('citizenship') is-invalid @enderror" id="citizenship" name="citizenship" value="{{ old('citizenship') }}" required>
                                @error('citizenship')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="passport_number" class="form-label">Passport Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('passport_number') is-invalid @enderror" id="passport_number" name="passport_number" value="{{ old('passport_number') }}" required>
                            @error('passport_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="photo_path" class="form-label">Photo</label>
                            <input type="file" class="form-control @error('photo_path') is-invalid @enderror" id="photo_path" name="photo_path" accept="image/*">
                            <small class="text-muted">Max file size: 2MB. Accepted formats: JPG, PNG, GIF</small>
                            @error('photo_path')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Visa
                            </button>
                            <a href="{{ route('visas.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

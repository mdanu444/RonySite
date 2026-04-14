@extends('layout')

@section('title', 'My Profile')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="mb-4"><i class="fas fa-user"></i> My Profile</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    @if($user->profile_photo_path)
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="mb-3" style="width: 150px; height: 150px; margin: 0 auto;">
                            <i class="fas fa-user-circle" style="font-size: 150px; color: #ccc;"></i>
                        </div>
                    @endif
                    <h4>{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->email }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Personal Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">Full Name</label>
                            <p class="h6">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Email Address</label>
                            <p class="h6">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">Phone Number</label>
                            <p class="h6">{{ $user->phone_number ?? 'Not provided' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Date of Birth</label>
                            <p class="h6">{{ $user->date_of_birth ? $user->date_of_birth->format('d/m/Y') : 'Not provided' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">Gender</label>
                            <p class="h6">{{ $user->gender ?? 'Not provided' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Member Since</label>
                            <p class="h6">{{ $user->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-muted">Address</label>
                            <p class="h6">{{ $user->address ?? 'Not provided' }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-muted">Bio</label>
                            <p class="h6">{{ $user->bio ?? 'Not provided' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

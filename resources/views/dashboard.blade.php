@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="mb-4"><i class="fas fa-chart-line"></i> Dashboard</h1>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <h3>{{ $totalVisas }}</h3>
                <p>Total Visas</p>
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <h3>{{ $activeVisas }}</h3>
                <p>Active Visas</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <h3>{{ $pendingVisas }}</h3>
                <p>Pending Visas</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                <h3>{{ $expiredVisas }}</h3>
                <p>Expired Visas</p>
            </div>
        </div> --}}


        <!-- Additional Stats -->

        <div class="col-md-6">
            <div class="stat-card" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); color: #333;">
                <h3>{{ $totalUsers }}</h3>
                <p>Total Users</p>
            </div>
        </div>

    </div>



    <!-- Recent Visas -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-file-contract"></i> Recent Visas</h5>
                </div>
                <div class="card-body">
                    @forelse($recentVisas as $visa)
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">{{ $visa->firstname }} {{ $visa->surname }}</h6>
                                    <small class="text-muted">Visa #: {{ $visa->visa_number }}</small>
                                </div>
                                <span class="badge bg-{{ $visa->visa_status == 'Active' ? 'success' : ($visa->visa_status == 'Expired' ? 'danger' : 'warning') }}">
                                    {{ $visa->visa_status }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">No visas found</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Users -->
        {{-- <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-users"></i> Recent Users</h5>
                </div>
                <div class="card-body">
                    @forelse($recentUsers as $user)
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">{{ $user->name }}</h6>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                                <small class="text-muted">{{ $user->created_at ? $user->created_at->diffForHumans() : 'Recently' }}</small>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">No users found</p>
                    @endforelse
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-bolt"></i> Quick Actions</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('visas.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Visa
                    </a>
                    <a href="{{ route('visas.index') }}" class="btn btn-info">
                        <i class="fas fa-list"></i> View All Visas
                    </a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-secondary">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

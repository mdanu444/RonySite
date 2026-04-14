@extends('layout')

@section('title', 'Manage Visas')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="mb-0"><i class="fas fa-file-contract"></i> Manage Visas</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('visas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Visa
            </a>
        </div>
    </div>

    {{-- <!-- Search Form -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('visas.search') }}" class="row g-3">
                <div class="col-md-9">
                    <input type="text" name="query" class="form-control" placeholder="Search by visa number, first name, or surname..." value="{{ request('query') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-info w-100">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div> --}}

    <!-- Visas Table -->
    <div class="card">
        <div class="card-body">
            @forelse($visas as $visa)
                @if ($loop->first)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Visa Number</th>
                                    <th>Name</th>
                                    <th>Citizenship</th>
                                    <th>Visa Type</th>
                                    <th>Status</th>
                                    <th>Validity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                @endif
                                <tr>
                                    <td><strong>{{ $visa->visa_number }}</strong></td>
                                    <td>{{ $visa->firstname }} {{ $visa->surname }}</td>
                                    <td>{{ $visa->citizenship }}</td>
                                    <td>{{ $visa->visa_type }}</td>
                                    <td>
                                        <span class="badge bg-{{ $visa->visa_status == 'Active' ? 'success' : ($visa->visa_status == 'Expired' ? 'danger' : ($visa->visa_status == 'Pending' ? 'warning' : 'secondary')) }}">
                                            {{ $visa->visa_status }}
                                        </span>
                                    </td>
                                    <td>{{ $visa->visa_validity ? $visa->visa_validity->format('d/m/Y') : 'Not available' }}</td>
                                    <td>
                                        <a href="{{ route('visas.show', $visa) }}" class="btn btn-sm btn-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('visas.edit', $visa) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('visas.destroy', $visa) }}" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                @if ($loop->last)
                            </tbody>
                        </table>
                    </div>
                @endif
            @empty
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> No visas found. <a href="{{ route('visas.create') }}">Create one now!</a>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $visas->links() }}
    </div>
</div>
@endsection

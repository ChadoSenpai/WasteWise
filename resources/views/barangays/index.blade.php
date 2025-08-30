@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')
    <div class="container-fluid">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h1>{{ $page['title'] }}</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBarangayModal">
                Add New Barangay
            </button>
        </div>

        {{-- Search Form --}}
        <form method="GET" action="{{ route('barangays.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Barangays..."
                    value="{{ request('search') }}">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
                </span>
            </div>
        </form>

        @if ($barangays->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barangay Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangays as $barangay)
                            <tr>
                                <td>{{ $barangay->id }}</td>
                                <td>{{ $barangay->name }}</td>
                                <td>{{ $barangay->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $barangay->updated_at->format('Y-m-d H:i') }}</td>
                                <td class="text-center">
                                    {{-- View Button --}}
                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#viewBarangayModal{{ $barangay->id }}">View</button>

                                    {{-- Edit Button --}}
                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editBarangayModal{{ $barangay->id }}">Edit</button>

                                    {{-- Delete --}}
                                    <form action="{{ route('barangays.destroy', $barangay->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this barangay?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            {{-- View Modal --}}
                            <div class="modal fade" id="viewBarangayModal{{ $barangay->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">View Barangay</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>ID:</strong> {{ $barangay->id }}</p>
                                            <p><strong>Name:</strong> {{ $barangay->name }}</p>
                                            <p><strong>Created At:</strong>
                                                {{ $barangay->created_at->format('Y-m-d H:i') }}</p>
                                            <p><strong>Updated At:</strong>
                                                {{ $barangay->updated_at->format('Y-m-d H:i') }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Edit Modal --}}
                            <div class="modal fade" id="editBarangayModal{{ $barangay->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('barangays.update', $barangay->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Barangay</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name{{ $barangay->id }}">Barangay Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        id="name{{ $barangay->id }}" value="{{ $barangay->name }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning">No barangays found.</div>
        @endif

    </div>

    {{-- Add Barangay Modal --}}
    <div class="modal fade" id="addBarangayModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('barangays.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Barangay</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Barangay Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

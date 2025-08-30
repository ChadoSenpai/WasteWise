@extends('layouts.master')

@section('title', $page['title'])

@section('content')
<div class="container">
    <h1>{{ $page['title'] }}</h1>

    <form action="{{ route('barangays.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Barangay Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('barangays.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

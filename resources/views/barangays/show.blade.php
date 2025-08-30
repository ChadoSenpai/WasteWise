@extends('layouts.master')

@section('title', $page['title'])

@section('content')
<div class="container">
    <h1>{{ $page['title'] }}</h1>

    <p><strong>ID:</strong> {{ $barangay->id }}</p>
    <p><strong>Name:</strong> {{ $barangay->name }}</p>
    <p><strong>Created At:</strong> {{ $barangay->created_at->format('Y-m-d H:i:s') }}</p>
    <p><strong>Updated At:</strong> {{ $barangay->updated_at->format('Y-m-d H:i:s') }}</p>

    <a href="{{ route('barangays.edit', $barangay->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('barangays.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection

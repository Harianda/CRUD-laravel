<!-- resources/views/profiles/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Profiles</h1>

    <a href="{{ route('profiles.create') }}" class="btn btn-primary mb-3">Create Profile</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($profiles as $profile)
                <tr>
                    <td>{{ $profile->id_profile }}</td>
                    <td>{{ $profile->id_user }}</td>
                    <td>{{ $profile->nama }}</td>
                    <td>{{ $profile->alamat }}</td>
                    <td>{{ $profile->notlp }}</td>
                    <td>
                        <a href="{{ route('profiles.edit', $profile) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('profiles.destroy', $profile) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No profiles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

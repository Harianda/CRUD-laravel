<!-- resources/views/roles/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Role</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_role">Name:</label>
            <input type="text" name="nama_role" id="nama_role" class="form-control" value="{{ $role->nama_role }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

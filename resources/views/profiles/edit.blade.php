<!-- resources/views/profiles/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Profile</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profiles.update', $profile) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_user">User ID:</label>
            <input type="number" name="id_user" id="id_user" class="form-control" value="{{ $profile->id_user }}" required>
        </div>
        <div class="form-group">
            <label for="nama">Name:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $profile->nama }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Address:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $profile->alamat }}"
                required>
        </div>
        <div class="form-group">
            <label for="notlp">Phone:</label>
            <input type="text" name="notlp" id="notlp" class="form-control" value="{{ $profile->notlp }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

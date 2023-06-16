<!-- resources/views/profiles/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Profile</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profiles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_user">User ID:</label>
            <select name="id_user" id="id_user" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id_user }}">{{ $user->username }}</option>
                @endforeach
            </select>
            {{-- <input type="number" name="id_user" id="id_user" class="form-control" required> --}}
        </div>
        <div class="form-group">
            <label for="nama">Name:</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Address:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="notlp">Phone:</label>
            <input type="text" name="notlp" id="notlp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

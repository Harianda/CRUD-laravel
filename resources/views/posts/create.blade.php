@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="id_user">User</label>
            <select name="id_user" id="id_user" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $users->id_user }}">{{ $users->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="picture" class="form-label">Input Cover Image</label>
            <input class="form-control" type="file" id="picture" name="picture">
        </div>
        <!-- Add other post fields here -->

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

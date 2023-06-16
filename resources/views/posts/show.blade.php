@extends('layouts.app')

@section('content')
    <h1>Post Details</h1>

    <div>
        <strong>ID:</strong> {{ $post->id_post }}<br>
        <strong>Title:</strong> {{ $post->title }}<br>
        <strong>User:</strong> {{ $post->user->username }}<br>
        <!-- Add other post details here -->
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
@endsection

@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card shadow-lg">
                        @if($post->image)
                            <div class="featured-img" style="background-image: url('{{ asset('storage/blogs/' . $post->image) }}');"></div>
                        @else
                            <div class="featured-img" style="background-image: url('{{ asset('assets/images/img_1_vertical.jpg') }}');"></div>
                        @endif 
                <div class="card-body">
                    <h1 class="card-title text-center display-4">{{ $post->title }}</h1>
                    <p class="card-text text-muted text-center">By <strong>{{ $post->user->name }}</strong> | <strong>{{ $post->created_at->format('D M Y') }}</strong></p>
                    <hr>
                    <p class="card-text lead">{{ $post->content }}</p>
                    <p class="card-text"><strong>Category:</strong> <span class="badge bg-primary">{{ $post->category->name }}</span></p>
                    <h2 class="text-center">Edit Post</h2>
                    <form action="{{ route('posts.edit', $post->id) }}" method="GET" class="text-center">
                        @csrf
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                    <h2 class="text-center">Delete Post</h2>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="text-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('posts.index') }}" class="btn btn-lg btn-primary">Back to Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
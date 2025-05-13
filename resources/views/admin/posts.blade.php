@extends('admin.admn')
@section('post','text-white')
@section('content')
        
    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Posts</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
            <table
                class="table table-striped table-bordered table-hover"
                id="example"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a href="{{route('admin.editPost', $post)}}" class="btn btn-primary">Edit</a>
                            <form action="{{route('admin.deletePost', $post)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{route('admin.createPost')}}" class="btn btn-primary">Create Post</a>
        </div>
        </div>
    </div> 
    </div>
    @endsection
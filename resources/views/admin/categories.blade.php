@extends('admin.admn')
@section('cat','text-white')
@section('content')
        
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Categories</h1>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{-- route('admin.categories.edit', $category->id) --}}" class="btn btn-primary">Edit</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="{{-- route('admin.categories.create') --}}" class="btn btn-primary">Create Category</a>
            </div>
        </div>
    </div>
    @endsection
                                            
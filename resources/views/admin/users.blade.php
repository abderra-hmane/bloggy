@extends('admin.admn')
@section('ad','text-white')

@section('content')

    <div class="container">
    
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Admins</h1>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <form action="{{ route('admin.deleteUser', $user) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('admin.editUser', $user) }}" class="btn btn-success">Edit</a>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('admin.createUser')}}" class="btn btn-primary">Create Admin</a>
            </div>
        </div>
    </div>
@endsection
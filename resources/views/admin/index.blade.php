@extends('admin.admn')
@section('active','text-white')
@section('content')
        
    <div class="row">
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Posts</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
            <p class="card-text">number of posts {{ $posts->count() }}</p>
            <a href="{{ route('admin.posts') }}" class="btn btn-primary">View Posts</a>
    
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Categories</h5>
            
            <p class="card-text">number of categories: {{ $categories->count() }}</p>
            <a href="{{ route('admin.categories') }}" class="btn btn-primary">View Categories</a>
            
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Admins</h5>
            
            <p class="card-text">number of admins: {{ $users->count() }}</p>
            <a href="{{ route('admin.users') }}" class="btn btn-primary">View Admins</a>

            
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
@endsection
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
    {{-- <!--  <div class="row">
    <div class="col">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <table class="table">
<thead>
<tr>
    <th scope="col">#</th>
    <th scope="col">First</th>
    <th scope="col">Last</th>
    <th scope="col">Handle</th>
</tr>
</thead>
<tbody>
<tr>
    <th scope="row">1</th>
    <td>Mark</td>
    <td>Otto</td>
    <td>@mdo</td>
</tr>
<tr>
    <th scope="row">2</th>
    <td>Jacob</td>
    <td>Thornton</td>
    <td>@fat</td>
</tr>
<tr>
    <th scope="row">3</th>
    <td>Larry</td>
    <td>the Bird</td>
    <td>@twitter</td>
</tr>
</tbody>
</table> -->
        </div>
        </div>
    </div>
    </div>
</div>
</div> --}}
</div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
@endsection
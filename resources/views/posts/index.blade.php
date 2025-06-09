@extends('layouts.app')
@section('content')

<!-- Start retroy layout blog posts -->
	<section class="section bg-light">
		<div class="container">

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
			<div class="row align-items-stretch retro-layout">
                <h1 class="posts-entry-title text-center text-primary my-4">My Posts</h1>
                @if ($Userposts->isEmpty())
                    <p class="text-center">No posts available.</p>
                @endif
                @foreach ($Userposts as $post)
                <div class="col-md-4">
                    <a href="{{route('posts.show', $post->id)}}" class="h-entry mb-30 v-height gradient">
                        @if($post->image)
                            <div class="featured-img" style="background-image: url('{{ asset('storage/blogs/' . $post->image) }}');"></div>
                        @else
                            <div class="featured-img" style="background-image: url('{{ asset('assets/images/img_1_vertical.jpg') }}');"></div>
                        @endif

						<div class="text">
							<span class="date">{{ $post->created_at->format('D M Y') }}</span>
							<h2>{{ $post->title }}</h2>
						</div>
					</a>
				</div>
                @endforeach
                <h1 class="posts-entry-title text-center text-primary my-4">Explore All Posts</h1>
                @foreach ($posts as $post)
                <div class="col-md-4">
                    <a href="{{route('posts.show', $post->id)}}" class="h-entry mb-30 v-height gradient">
                        @if($post->image)
                            <div class="featured-img" style="background-image: url('{{ asset('storage/blogs/' . $post->image) }}');"></div>
                        @else
                            <div class="featured-img" style="background-image: url('{{ asset('assets/images/img_1_vertical.jpg') }}');"></div>
                        @endif                        <div class="text">
                            <span class="date">{{ $post->created_at->format('D M Y') }}</span>
                            <h2>{{ $post->title }}</h2>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
			
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start Category-entry -->
    @foreach($categories as $category)
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title text-center">{{ $category->name }}</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="{{route('theme.index', $category->id)}}" class="read-more">View All</a></div>
            </div>
            <div class="row align-items-stretch retro-layout ">
                @if($category->posts->isEmpty())
                    <p>No posts available in this category.</p>
                @endif
 
                @foreach($category->posts as $post)
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="{{route('posts.show', $post->id)}}" class="h-entry mb-30 v-height gradient">
                            @if($post->image)
                            <div class="featured-img" style="background-image: url('{{ asset('storage/blogs/' . $post->image) }}');"></div>
                            @else
                                <div class="featured-img" style="background-image: url('{{ asset('assets/images/img_1_vertical.jpg') }}');"></div>
                            @endif                        
                        </a>
                        <span class="date">{{ $post->created_at->format('D M Y') }}</span>
                        <h2><a href="{{route('posts.show', $post->id)}}">{{ $post->title }}</a></h2>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                        <p><a href="{{route('posts.show', $post->id)}}" class="read-more">Continue Reading</a></p>
                    </div>
                </div> 
                
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
    <!-- End Category-entry -->
	
@endsection
@extends('layouts.app')
@section('content')
<!-- Start Category-entry -->
	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
                <h1 class="posts-entry-title text-center text-primary my-4">{{$CatName}} Posts</h1>
                @foreach ($posts as $post)
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
                
            </div>
			
		</div>
	</section>
    <!-- End Category-entry -->
@endsection

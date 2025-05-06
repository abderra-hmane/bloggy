@extends('layouts.app')
@section('content')

<!-- Start retroy layout blog posts -->
	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
                @foreach ($posts as $post)
                <div class="col-md-4">
					<a href="single.html" class="h-entry img-5 h-100 gradient">

						<div class="featured-img" style="background-image: url('{{asset('assets/images/img_1_vertical.jpg')}}');"></div>

						<div class="text">
							<span class="date">{{ $post->created_at->format('D M Y') }}</span>
							<h2>{{ $post->title }}</h2>
						</div>
					</a>
				</div>
                @endforeach
				<div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url({{asset('assets/images/img_2_horizontal.jpg')}};"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>AI can now kill those annoying cookie pop-ups</h2>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient">

						<div class="featured-img" style="background-image: url({{asset('assets/images/img_5_horizontal.jpg')}};"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Don’t assume your user data in the cloud is safe</h2>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry img-5 h-100 gradient">

						<div class="featured-img" style="background-image: url({{asset('assets/images/img_1_vertical.jpg')}};"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Why is my internet so slow?</h2>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url({{asset('assets/images/img_3_horizontal.jpg')}};"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Startup vs corporate: What job suits you best?</h2>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient">

						<div class="featured-img" style="background-image: url({{asset('assets/images/img_4_horizontal.jpg')}};"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Thought you loved Python? Wait until you meet Rust</h2>
						</div>
					</a>
				</div>
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
                    <h2 class="posts-entry-title">{{ $category->name }}</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="{{-- route('categories.show', $category->id) --}}" class="read-more">View All</a></div>
            </div>
            <div class="row g-3">
                @if($category->posts->isEmpty())
                    <p>No posts available in this category.</p>
                @endif

                @foreach($category->posts as $post)
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="route('posts.show', $post->id)" class="img-link">
                            <img src="{{ asset('assets/images/' . $post->image) }}" alt="Image" class="img-fluid">
                        </a>
                        <span class="date">{{ $post->created_at->format('D M Y') }}</span>
                        <h2><a href="route('posts.show', $post->id)">{{ $post->title }}</a></h2>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                        <p><a href="route('posts.show', $post->id)" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
    <!-- End Category-entry -->
	
@endsection
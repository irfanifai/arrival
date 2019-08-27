@extends('front.app')

@section("title") Blog @endsection

@section('content')
<div class="blog">
	<div class="container">
        <h3>Blogs</h3>

        <div class="single-inline">
                @foreach ($posts as $post)
                <div class="blog-to">
                    <a href="single.html"><img class="img-responsive sin-on blog-margin" src="{{asset('storage/' . $post->featured)}}" alt="" /></a>
                    <div class="blog-top">
                        <div class="blog-left">
                            <b>15</b>
                            <span>Feb</span>
                        </div>
                        <div class="top-blog">
                            <a class="fast text-capitalize" href="{{ url('/blog/' . $post->slug) }}">{{ $post->title }}</a>
                            <p>Posted by <b>{{ $post->user->name }}</b> in <b>{{ $post->category->title }}</b> | <b>{{ $post->comments()->count() }} Comments</b></p>
                            <p>{!! substr($post->body, 0, 250) !!}...</p>
                            <a href="{{ url('/blog/' . $post->slug) }}" class="more readmore">Readmore<span> </span></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                @endforeach
            </div>

        <nav>
            <tr>
                <td colspan=10>
                    {{$posts->links()}}
                </td>
            </tr>
        </nav>
    </div>
    </div>
	<!-- //blog -->

	</div>
</div>
@endsection

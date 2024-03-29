@extends('front.app')

@section("title") Blog @endsection

@section('content')
<div class="blog">
	<div class="container">
        <h3>Blog</h3>
        <div class="single-inline">
                @foreach ($posts as $post)
                <div class="blog-to">
                    <a href="single.html"><img class="img-responsive sin-on blog-margin" src="{{asset($post->featured)}}" alt="" /></a>
                    <div class="blog-top">
                        <div class="blog-left">
                            @php $date = $post->created_at; $date = date( "d", strtotime($date)); $month = $post->created_at; $month = date( "M", strtotime($month)); @endphp
                            <b>{{ $date }}</b>
                            <span>{{ $month }}</span>
                        </div>
                        <div class="top-blog">
                            <a class="fast text-capitalize" href="{{ url('/blog/' . $post->slug) }}">{{ $post->title }}</a>
                            <p>Diposting oleh <b>{{ $post->user->name }}</b> in <b>{{ $post->category->title }}</b> |<a href="{{ url('/blog/' . $post->slug) }}#disqus_thread"></a></p>
                            <p>{!! substr($post->body, 0, 250) !!}...</p>
                            <a href="{{ url('/blog/' . $post->slug) }}" class="more readmore">Baca Lebih Lanjut<span> </span></a>
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
</div>
@endsection

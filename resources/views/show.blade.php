@extends('front.app')

@section("title") Blog @endsection

@section('content')
<div class="single">
	<div class="container">
		<h3>{{ $post->title }}</h3>

        <div class="single wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
            <div class="blog-to1 service_info">

                <img class="img-responsive sin-on" src="{{asset('storage/' . $post->featured)}}" alt="" />
                <div class="blog-top">
                    <div class="blog-left">
                        @php $date = $post->created_at; $date = date( "d", strtotime($date)); $month = $post->created_at; $month = date( "M", strtotime($month)); @endphp
                        <b>{{ $date }}</b>
                        <span>{{ $month }}</span>
                    </div>
                    <div class="top-blog">
                        <a class="fast" href="{{ url('/blog/' . $post->slug) }}">{{ $post->title }}</a>
                        <p>Posted by <b>{{ $post->user->name }}</b> in <b>{{ $post->category->title }}</b> | <b>{{ $post->comments()->count() }} Comments</b></p>
                        <p class="sed text-justify">{!! $post->body !!}</p>
                    <div class="col-md-6 md-in">
                </div>
                {{-- <tr>
                    <td colspan=10>
                        {{ $post->comment()->links()}}
                    </td>
                </tr> --}}
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>

		<div class="single-middle">
            <h3>{{ $post->comments->count() }} Komentar</h3>
                @if ($post->comments)
                    @foreach ($post->comments as $comment)
                        @if ($comment->status == 1)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="{{ asset('travels-web/images/co.png') }}" alt="">
                                    </a>
                                    </div>
                                    <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{ $comment->name}}</a></h4>
                                    <p>{{ $comment->body }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach

                @endif
            </div>
            <div class="clearfix"> </div>
        </div>
		<!---->
		<div class="single-bottom">
			<h3>Tulis Komentar</h3>
                {!! Form::open(['route' => ['post.comment', $post->slug], 'method' => 'POST']) !!}
                @csrf
                    <div class="col-md-6 comment">
                        {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Nama Lengkap', 'required']) !!}
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-6 comment">
                        {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Email Address', 'required']) !!}
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="clearfix"> </div>
                        {!! Form::textarea('body', null, ['id' => 'textarea', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Isi Komentar', 'required']) !!}
                        @if ($errors->has('body'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                        @endif
                    <input type="submit" class="commentsend" value="Send">
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection

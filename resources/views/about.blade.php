@extends('front.app')

@section("title") About @endsection

@section('content')
<div class="abouts">
    <div class="container">
        <h3>Tentang Kami</h3>
        <div class="about-main">
            @foreach ($about as $about)
                @if ($about->id == 1)
                    <div class="about-top">
                        <div class="col-md-5 about-top-left">
                            <img src="{{ asset($about->featured) }}" class="img-responsive" alt=""/>
                        </div>
                        <div class="col-md-7 about-top-right">
                            <h4>{{ $about->title }}</h4>
                            <p>{!! $about->body !!}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="who_are">
        <div class="container">
            @foreach ($abouttwo as $about)
                @if ($about->id == 2)
                <h4>{{ $about->title }}</h4>
                <p>{!! $about->body !!}</p>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection

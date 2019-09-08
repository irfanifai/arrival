@extends('front.app')

@section("title") About @endsection

@section('content')
<div class="abouts">
    <div class="container">
        <h3>About Us</h3>
        <div class="about-main">
            @foreach ($about as $about)
                @if ($about->id == 1)
                    <div class="about-top">
                        <div class="col-md-5 about-top-left">
                            <img src="{{ asset('storage/' . $about->featured) }}" class="img-responsive" alt=""/>
                        </div>
                        <div class="col-md-7 about-top-right">
                            <h4>{{ $about->title }}</h4>
                            <p>{{ strip_tags($about->body) }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="who_are">
        <div class="container">
            <h5>WHO WE ARE</h5>
            @foreach ($abouttwo as $about)
                @if ($about->id == 2)
                <h4>{{ $about->title }}</h4>
                <p>{{ strip_tags($about->body) }}</p>
                @endif
            @endforeach
            <div class="about-list">
                <ul>
                    <li><a href="">Always free from repetition</a></li>
                    <li><a href="">Vestibulum rhoncus nibh quis dui fermentum iaculis.</a></li>
                    <li><a href="">The standard chunk of Lorem Ipsum</a></li>
                    <li><a href="">In consequat dolor in lorem egestas ultrices.</a></li>
                    <li><a href="">Aliquam sollicitudin eros id luctus consequat.</a></li>
                    <li class="none"><a href="">Always free from repetition</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

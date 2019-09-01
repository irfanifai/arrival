@extends('admin.app')

@section("title") About @endsection

@section("header") About @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item active">About</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-4 col-lg-12">

        @if (session('status'))
            <div class="flash-data"
                data-flashdata="{{ session('status') }}">
            </div>
        @endif

        <article class="article article-style-c">
            @foreach ($about as $about)
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills justify-content-end">
                        <li class="nav-item">
                            <a href="{{ route('admin.about.edit', ['id' => $about->id]) }}" class="nav-link">Edit</a>
                        </li>
                    </ul>
                </div>
            </div>

                <div class="article-header">
                    <div class="article-image" data-background="{{asset('storage/' . $about->featured)}}"></div>
                </div>
                <div class="article-details">
                    <div class="article-title">
                        <h2><a href="#">{{ $about->title }}</a></h2>
                    </div>
                    <p>{{ strip_tags($about->body) }}</p>
                </div>
            @endforeach
        </article>
    </div>
</div>
@endsection

@extends('admin.app')

@section("title") About @endsection

@section("header") About @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
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

        <div class="row">
            @foreach ($about as $about)
            <div class="col-md-6">
                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item">
                        <a href="{{ route('admin.about.edit', ['id' => $about->id]) }}" class="nav-link">Edit</a>
                    </li>
                </ul>

                <div class="card">
                    <img src="{{asset($about->featured)}}" class="card-img-top" alt="featured">
                    <div class="card-body">
                        <h5 class="card-title">{{ $about->title }}</h5>
                        <p class="card-text">{!! substr($about->body, 0, 450) !!}...</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection

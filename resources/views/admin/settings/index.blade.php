@extends('admin.app')

@section("title") Pengaturan Footer @endsection

@section("header") Pengaturan Footer @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></div>
<div class="breadcrumb-item active">Pengaturan Footer</div>
@endsection

@section('content')
<div class="row text-left">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">

            @if (session('status'))
                <div class="flash-data"
                    data-flashdata="{{ session('status') }}">
                </div>
            @endif

            <form method="POST" action="{{route('admin.settings.store', ['id'=>$setting->id])}}">
                @csrf
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-social" role="tab">Social</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $setting->title }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tagline">Tagline</label>
                                <input type="text" class="form-control @error('tagline') is-invalid @enderror" name="tagline" id="tagline" value="{{ $setting->tagline }}">
                                @error('tagline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $setting->phone }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $setting->email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ $setting->address }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-social" role="tabpanel" aria-labelledby="pills-social-tab">
                            <div class="form-group">
                                <label for="so_facebook">Facebook</label>
                                <input type="text" class="form-control @error('so_facebook') is-invalid @enderror" title="so_facebook" id="so_facebook" value="{{ $setting->so_facebook }}">
                                @error('so_facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="so_twitter">Twitter</label>
                                <input type="text" class="form-control @error('so_twitter') is-invalid @enderror" title="so_twitter" id="so_twitter" value="{{ $setting->so_twitter }}">
                                @error('so_twitter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="so_instagram">Instagram</label>
                                <input type="text" class="form-control @error('so_instagram') is-invalid @enderror" title="so_instagram" id="so_instagram" value="{{ $setting->so_instagram }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Publish</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

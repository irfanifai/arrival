@extends('admin.app')

@section("title") About @endsection

@section("header") About @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item active">About</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.about.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="your title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        {!! Form::textarea('body', null, ['id' => 'content', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control']) !!}
                        @if ($errors->has('body'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Featured Image</label>
                        <input type="file" class="form-control pb-5" name="featured" id="featured">
                    </div>

                    <input class="btn btn-primary" type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

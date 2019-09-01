@extends("admin.app")

@section("title") About @endsection

@section("header") Edit About @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.about.index') }}">About</a></div>
<div class="breadcrumb-item active">Edit About</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                {!! Form::model($about, ['route' => ['admin.about.update', $about->id], 'method' => 'PUT']) !!}
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        {!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
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
                        <input type="file" class="form-control pb-3" name="featured" id="featured">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Save">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

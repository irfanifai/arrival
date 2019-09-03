@extends("admin.app")

@section("title") Artikel @endsection

@section("header") Buat Artikel @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Artikel</a></div>
<div class="breadcrumb-item active">Buat Artikel</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.posts.store') }}">
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
                        <label>Category</label>
                        {!! Form::select('category_id', ['' => '-']+ App\Category::pluck('title', 'id')->all() , null, ['class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                        @if ($errors->has('category_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="published_at">Date</label>
                        {!! Form::text('published_at', date("Y-m-d H:i:s"), ['id' => 'datetime', 'class' => $errors->has('published_at') ? 'form-control is-invalid' : 'form-control', 'readonly']) !!}
                        @if ($errors->has('published_at'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('published_at') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        {!! Form::select('status', ['2' => 'Draft', '1' => 'Publish'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                        @if ($errors->has('status'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Featured Image</label>
                        <input type="file" class="form-control pb-5" name="featured" id="featured">
                    </div>

                    <input class="btn btn-primary" type="submit" value="Save"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

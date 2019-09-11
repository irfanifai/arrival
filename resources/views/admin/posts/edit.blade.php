@extends("admin.app")

@section("title") Artikel @endsection

@section("header") Edit Artikel @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Artikel</a></div>
<div class="breadcrumb-item active">Edit Artikel</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul Artikel</label>
                        {!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Isi Artikel</label>
                        {!! Form::textarea('body', null, ['id' => 'content', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control']) !!}
                        @if ($errors->has('body'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Kategori Artikel</label>
                        {!! Form::select('category_id', ['' => '-']+ App\Category::pluck('title', 'id')->all() , null, ['class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                        @if ($errors->has('category_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="published_at">Tanggal Upload</label>
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
                        <label>Gambar Utama</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="featured" id="featured" accept="image/*" onchange="showMyImage(this)">
                            <label class="custom-file-label" for="featured">Pilih Gambar</label>
                        </div>
                        <img class="createPost" id="thumbnail" src="">
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

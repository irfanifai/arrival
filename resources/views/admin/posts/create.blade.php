@extends("admin.app")

@section("title") Artikel @endsection

@section("header") Buat Artikel @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
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
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="judul artikel">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                        <label>Kategori</label>
                        {!! Form::select('category_id', ['' => '-']+ App\Category::pluck('title', 'id')->all() , null, ['class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                        @if ($errors->has('category_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="published_at">Tanggal Dibuat</label>
                        {!! Form::text('published_at', date("Y-m-d H:i:s"), ['id' => 'datetime', 'class' => $errors->has('published_at') ? 'form-control is-invalid' : 'form-control', 'readonly']) !!}
                        @if ($errors->has('published_at'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('published_at') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        {!! Form::select('status', ['1' => 'Publish', '2' => 'Draft'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

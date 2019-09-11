@extends('admin.app')

@section("title") About @endsection

@section("header") About @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
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
                        <label>Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="judul">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Isi</label>
                        {!! Form::textarea('body', null, ['id' => 'content', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control']) !!}
                        @if ($errors->has('body'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
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

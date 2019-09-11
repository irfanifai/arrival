@extends("admin.app")

@section("title") About @endsection

@section("header") Edit About @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.about.index') }}">About</a></div>
<div class="breadcrumb-item active">Edit About</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                {!! Form::model($about, ['route' => ['admin.about.update', $about->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul</label>
                        {!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
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
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@extends("admin.app")

@section("title") Kategori @endsection

@section("header") Buat Kategori Baru @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Kategori</a></div>
<div class="breadcrumb-item active">Buat Kategori Baru</div>
@endsection

@section("content")
<div class="row">
    <div class="col-6 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Judul Kategori</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="judul kategori">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</dislugv>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

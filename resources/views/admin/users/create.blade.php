@extends("admin.app")

@section("title") Pengguna @endsection

@section("header") Buat Pengguna Baru @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Pengguna</a></div>
<div class="breadcrumb-item active">Buat Pengguna</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="nama lengkap">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="user@mail.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password confirmation" placeholder="konfirmasi password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Foto Profile</label>
                        <input type="file" class="form-control pb-5" name="avatar" id="avatar">
                    </div>

                    <input class="btn btn-primary" type="submit" value="Save"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

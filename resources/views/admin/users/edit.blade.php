@extends("admin.app")

@section("title") Pengguna @endsection

@section("header") Edit Pengguna @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Pengguna</a></div>
<div class="breadcrumb-item active">Edit Pengguna</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">

            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{route('admin.users.update', ['id'=>$user->id])}}">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email Pengguna</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}">
                        @error('email')
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
@endsection

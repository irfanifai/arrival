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

                    <div class="row">
                        <div class="form-group col-md-4 col-4">
                            <p class="text-center">Foto Profile Saat Ini</p>
                            <img class="img-thumbnail" src="{{ asset($user->avatar) }}" width="320px" height="280px">
                        </div>
                        <div class="form-group col-md-8 col-8 mt-4">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror <br>
                            <label>Email Pengguna</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror <br>
                            <label>Status</label>
                            {!! Form::select('status', ['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                            @if ($errors->has('status'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif <br>
                            <label class="text-center">Upload Foto Profile Baru</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  name="avatar" id="avatar" accept="image/*" onchange="showMyImage(this)">
                                <label class="custom-file-label" for="avatar">Pilih Gambar</label>
                            </div>
                            <img class="editUser" id="thumbnail" src=""/>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </form>
            </div>
    </div>
</div>
@endsection

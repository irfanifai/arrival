@extends("admin.app")

@section("title") Komentar @endsection

@section("header") Edit Komentar @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Komentar</a></div>
<div class="breadcrumb-item active">Edit Komentar</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.comments.update', ['id'=>$comment->id]) }}">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $comment->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{ $comment->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Isi Komentar</label>
                        <input type="text" class="form-control" value="{{ $comment->body }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        {!! Form::select('status', [1 => 'Publish', 2 => 'Hide'], null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

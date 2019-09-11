@extends("admin.app")

@section("title") Komentar @endsection

@section("header") Detail Komentar @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Komentar</a></div>
<div class="breadcrumb-item active">Detail Komentar</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-header text-white bg-primary font-weight-bold">
                Judul Artikel : {{ $comments->post->title }}
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>ID</td>
                        <td>{{ $comments->id }}</td>
                    </tr>
                    <tr>
                        <td>Nama Pengirim</td>
                        <td>{{ $comments->name }}</td>
                    </tr>
                    <tr>
                        <td>Email Pengirim</td>
                        <td>{{ $comments->email }}</td>
                    </tr>
                    <tr>
                        <td>Isi Komentar</td>
                        <td>{{ $comments->body }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Komentar</td>
                        <td>{{ $comments->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $comments->status == 1 ? 'Publish' : 'Hide' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


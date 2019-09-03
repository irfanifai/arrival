@extends("admin.app")

@section("title") Artikel @endsection

@section("header") Detail Artikel @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Artikel</a></div>
<div class="breadcrumb-item active">Detail Artikel</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>ID</th>
                            <td>{{ $posts->id }}</td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>{{ $posts->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Upload</th>
                            <td>{{ $posts->published_at }}</td>
                        </tr>
                        <tr>
                            <th>Judul Artikel</th>
                            <td>{{ $posts->title }}</td>
                        </tr>
                        <tr>
                            <th>Isi Artikel</th>
                            <td>{!! $posts->body !!}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $posts->category->title }}</td>
                        </tr>
                        <tr>
                            <th>Gambar Utama</th>
                            <td><img src="{{asset('storage/' . $posts->featured)}}" alt="Featured Image"  height="450" width="865"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


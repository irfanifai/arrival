@extends("admin.app")

@section("title") Pesan @endsection

@section("header") Detail Pesan @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.messages.index') }}">Pesan</a></div>
<div class="breadcrumb-item active">Detail Pesan</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>Nama Pengirim</td>
                        <td>{{ $message->name }}</td>
                    </tr>
                    <tr>
                        <td>Email Pengirim</td>
                        <td>{{ $message->email }}</td>
                    </tr>
                    <tr>
                        <td>Isi Pesan</td>
                        <td>{{ $message->message }}</td>
                    </tr>
                    <tr>
                        <td>Waktu Diterima</td>
                        @php $date = $message->created_at; $date = date( "d M Y h:i", strtotime($date));@endphp
                        <td>{{ $date }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


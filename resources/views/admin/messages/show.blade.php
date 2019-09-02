@extends("admin.app")

@section("title") Message @endsection

@section("header") Detail Message @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.messages.index') }}">Messages</a></div>
<div class="breadcrumb-item active">Detail Message</div>
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
                        <td>{{ $message->created_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


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
        <div class="card card-primary">
            <div class="card-header">
                <h4>Isi Pesan</h4>
            </div>

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

<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Balas Pesan</h4>
            </div>

            <div class="card-body">
                <!-- Form Kirim Email -->
                <form action="{{ route('admin.messages.email') }}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label>Email Pengirim</label>
                        <input type="text" class="form-control" name="email" value="{{ $message->email }}">
                    </div>
                    <div class="form-group">
                        <label>Nama Pengirim</label>
                        <input type="text" class="form-control" name="name" value="{{ $message->name }}">
                    </div>
                    <div class="form-group">
                        <label>Isi Balasan Pesan</label>
                        <textarea type="text" class="form-control" name="email_body"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Kirim Email</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
                <!-- End Form Kirim Email -->
            </div>
        </div>
    </div>
</div>
@endsection

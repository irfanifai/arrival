@extends('admin.app')

@section("title") Pesan @endsection

@section("header") Daftar Pesan @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item active">Pesan</div>
@endsection

@section('content')
<div class="row text-center">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">

            @if (session('status'))
                <div class="flash-data"
                    data-flashdata="{{ session('status') }}">
                </div>
            @endif

            <div class="col-md-4 float-right mb-4">
                <form action="{{ route('admin.messages.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('keyword')}}" name="keyword" placeholder="cari berdasarkan nama pegirim">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>Nama Pengirim</th>
                    <th>Email Pengirim</th>
                    <th>Isi Pesan</th>
                    <th>Tanggal Diterima</th>
                    <th>Action</th>
                </tr>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{!! substr($message->message, 0, 10) !!}...</td>
                        @php
                        $date = $message->created_at;
                        $date = date( "d M Y h:i", strtotime($date));
                        @endphp
                        <td>{{ $date }}</td>
                        <td>
                            <a href="{{ route('admin.messages.show', ['id' => $message->id]) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i class="fas fa-info"></i></i></a>

                            <form onsubmit="return confirm('Hapus Pesan?')" class="d-inline" action="{{route('admin.messages.destroy', ['id' => $message->id ])}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tfoot>
                    <tr>
                        <td colspan=10>
                            {{$messages->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

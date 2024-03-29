@extends('admin.app')

@section("title") Pengguna @endsection

@section("header") Daftar Pengguna @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item active">Pengguna</div>
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

            <div class="float-right mb-4">
                <form action="{{ route('admin.users.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('keyword')}}" name="keyword" placeholder="cari berdasarkan nama">
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
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($user->avatar)
                                <img src="{{ asset($user->avatar) }}" width="50px">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" width="50px">
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @php
                        $date = $user->created_at;
                        $date = date( "d M Y h:i", strtotime($date));
                        @endphp
                        <td>{{ $date }}</td>
                        <td>
                            @if($user->status == "ACTIVE")
                            <span class="badge badge-success">
                                {{ $user->status }}
                            </span>
                            @else
                            <span class="badge badge-danger">
                                {{ $user->status }}
                            </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i class="fas fa-info"></i></i></a>

                            <form onsubmit="return confirm('Hapus pengguna secara permanen?')" class="d-inline" action="{{route('admin.users.destroy', ['id' => $user->id ])}}" method="POST">
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
                            {{$users->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

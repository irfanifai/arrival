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
            <div class="card-body p-0">

            @if (session('status'))
                <div class="flash-data"
                    data-flashdata="{{ session('status') }}">
                </div>
            @endif

            <div class="row mt-3 ml-3">
                <div class="col-md-6 ">
                    <form action="{{ route('admin.users.index') }}">
                        <div class="input-group mb-3">
                            <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10"
                            type="text" placeholder="cari berdasarkan nama"/>

                            <div class="input-group-append">
                                <input type="submit"value="Cari" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
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
                                <img src="{{ asset('storage/'.$user->avatar) }}" width="50px">
                            @else
                                N/A
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

                            <form onsubmit="return confirm('Move user to trash?')" class="d-inline" action="{{route('admin.users.destroy', ['id' => $user->id ])}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Trash"><i class="fas fa-trash"></i>
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

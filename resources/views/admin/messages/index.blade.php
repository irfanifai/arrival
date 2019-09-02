@extends('admin.app')

@section("title") Message @endsection

@section("header") List Message @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item active">Message</div>
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
                    <form action="{{ route('admin.messages.index') }}">
                        <div class="input-group mb-3">
                            <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10"
                            type="text" placeholder="filter berdasarkan name"/>

                            <div class="input-group-append">
                                <input type="submit"value="Filter" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Isi Pesan</th>
                    <th>Tanggal Diterima</th>
                    <th>Action</th>
                </tr>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        @php $isi = $message->message; $max = 40; $isi = substr($isi, 0, $max) . '...'; @endphp
                        <td>{{ $isi }}</td>
                        @php
                        $date = $message->created_at;
                        $date = date( "d M Y h:i", strtotime($date));
                        @endphp
                        <td>{{ $date }}</td>
                        <td>
                            <a href="{{ route('admin.messages.show', ['id' => $message->id]) }}" class="btn btn-primary">Detail</a>

                            <form onsubmit="return confirm('Delete this message permanently?')" class="d-inline" action="{{route('admin.messages.destroy', ['id' => $message->id ])}}" method="POST">
                                @method('delete')
                                @csrf

                                <button type="submit" value="Delete" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tfoot>
                    <tr>
                        {{-- <td colspan=10>
                            {{$message->appends(Request::all())->links()}}
                        </td> --}}
                    </tr>
                </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

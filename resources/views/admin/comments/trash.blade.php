@extends('admin.app')

@section("title") Komentar @endsection

@section("header") Trash Komentar @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Komentar</a></div>
<div class="breadcrumb-item active">Trash Komentar</div>
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
                <form action="{{ route('admin.comments.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('keyword')}}" name="keyword" placeholder="cari berdasarkan nama">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>

            <div class=" col-md-8 float-left mb-4">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('status') == NULL && Request::path() == 'admin/comments' ? 'active' : ''}}" href="{{route('admin.comments.index')}}">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('status') == '1'? 'active' : '' }}" href="{{route('admin.comments.index', ['status' => 1])}}">Publish</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('status') == '2'? 'active' : '' }}" href="{{route('admin.comments.index', ['status' => 2])}}">Hide</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::path() == 'admin/comments/trash' ? 'active' : ''}}" href="{{route('admin.comments.trash')}}">Trash</a>
                    </li>
                </ul>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Isi Komentar</th>
                    <th>Judul Artikel</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $comment->name }}</td>
                        @php $body = $comment->body; $max = 30; $body = substr($body, 0, $max) . '...'; @endphp
                        <td>{{ $body }}</td>
                        @php $title = $comment->post->title; $max = 40; $title = substr($title, 0, $max) . '...'; @endphp
                        <td>{{ $title }}</td>
                        <td>
                            @if($comment->status == 1)
                            <span class="badge badge-success">
                                {{ 'PUBLISH' }}
                            </span>
                            @else
                            <span class="badge badge-danger">
                                {{ 'HIDE' }}
                            </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.comments.restore', ['id' => $comment->id]) }}" class="btn btn-success">Restore</a>

                            <form onsubmit="return confirm('Delete this comment permanently?')" class="d-inline" action="{{route('admin.comments.delete-permanent', ['id' => $comment->id ])}}" method="POST">
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
                        <td colspan=10>
                            {{ $comments->appends(Request::all())->links() }}
                        </td>
                    </tr>
                </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

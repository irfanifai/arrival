@extends('admin.app')

@section("title") Comments @endsection

@section("header") List Comments @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item active">Comments</div>
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
                    <form action="{{ route('admin.comments.index') }}">
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

            <div class="row mb-4 mr-2">
                <div class="col-md-12">
                    <ul class="nav nav-pills justify-content-end">
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
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Comment</th>
                    <th>Post</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $comment->name }}</td>
                        @php $body = $comment->body; $max = 20; $body = substr($body, 0, $max) . '...'; @endphp
                        <td>{{ $body }}</td>
                        @php $title = $comment->post->title; $max = 30; $title = substr($title, 0, $max) . '...'; @endphp
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
                            <a href="{{ route('admin.comments.edit', ['id' => $comment->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.comments.show', ['id' => $comment->id]) }}" class="btn btn-primary">Detail</a>

                            <form onsubmit="return confirm('Move comment to trash?')" class="d-inline" action="{{route('admin.comments.destroy', ['id' => $comment->id ])}}" method="POST">
                                @method('delete')
                                @csrf

                                <button type="submit" value="Trash" class="btn btn-danger">
                                    Trash
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tfoot>
                    <tr>
                        <td colspan=10>
                            {{$comments->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

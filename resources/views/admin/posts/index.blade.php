@extends('admin.app')

@section("title") Artikel @endsection

@section("header") Daftar Artikel @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item active">Artikel</div>
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
                <form action="{{ route('admin.posts.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('keyword')}}" name="keyword" placeholder="cari berdasarkan judul artikel">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>

            <div class=" col-md-8 float-left mb-4">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('status') == NULL && Request::path() == 'admin/posts' ? 'active' : ''}}" href="{{route('admin.posts.index')}}">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('status') == '1'? 'active' : '' }}" href="{{route('admin.posts.index', ['status' => 1])}}">Publish</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('status') == '2'? 'active' : '' }}" href="{{route('admin.posts.index', ['status' => 2])}}">Draft</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::path() == 'admin/posts/trash' ? 'active' : ''}}" href="{{route('admin.posts.trash')}}">Trash</a>
                    </li>
                </ul>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>Judul Artikel</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!! substr($post->title, 0, 20) !!}...</td>
                        <td><img src="{{ asset($post->user->avatar) }}" alt="avatar" width="30" class="rounded-circle mr-1"> {{ $post->user->name }}</td>
                        <td>{{ $post->category->title }}</td>
                        <td>
                            @if($post->status == 1)
                            <span class="badge badge-success">
                                {{ 'PUBLISH' }}
                            </span>
                            @else
                            <span class="badge badge-danger">
                                {{ 'DRAFT' }}
                            </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('admin.posts.show', ['id' => $post->id]) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i class="fas fa-info"></i></i></a>

                            <form onsubmit="return confirm('Pindahkan artikel ke trash?')" class="d-inline" action="{{route('admin.posts.destroy', ['id' => $post->id ])}}" method="POST">
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
                            {{$posts->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>

                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

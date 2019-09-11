@extends('admin.app')

@section("title") Kategori @endsection

@section("header") Daftar Kategori @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item active">Kategori</div>
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
                <form action="{{ route('admin.categories.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('name')}}" name="name" placeholder="cari berdasarkan judul kategori">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>

            <div class=" col-md-8 float-left mb-3">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Buat Kategori Baru</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a href="{{route('admin.categories.trash')}}" class="btn btn-primary">Trash</a>
                    </li>
                </ul>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>Judul Kategori</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $categorie->title }}</td>
                        <td>{{ $categorie->slug }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['id' => $categorie->id]) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>

                            <form onsubmit="return confirm('Pindahkan kategori to trash?')" class="d-inline" action="{{route('admin.categories.destroy', ['id' => $categorie->id ])}}" method="POST">
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
                            {{$categories->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

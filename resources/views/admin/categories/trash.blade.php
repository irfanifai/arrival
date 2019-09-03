@extends('admin.app')

@section("title") Kategori @endsection

@section("header") Trash Kategori @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Kategori</a></div>
<div class="breadcrumb-item active">Trash Kategori</div>
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
                    <form action="{{route('admin.categories.index')}}">
                        <div class="input-group mb-3">
                            <input value="{{Request::get('name')}}" name="name" class="form-control col-md-10"
                            type="text" placeholder="cari berdasarkan judul kategori">

                            <div class="input-group-append">
                                <input type="submit"value="Cari" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mr-1">
                <div class="col-md-12 text-right">
                    <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Buat Kategori Baru</a>
                    <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Semua Kategori</a>
                    <a href="{{route('admin.categories.trash')}}" class="btn btn-primary">Trash</a>
                </div>
            </div>
            <br>

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
                            <a href="{{ route('admin.categories.restore', ['id' => $categorie->id]) }}" class="btn btn-success">Restore</a>

                            <form onsubmit="return confirm('Delete this category permanently?')" class="d-inline" action="{{route('admin.categories.delete-permanent', ['id' => $categorie->id ])}}" method="POST">
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

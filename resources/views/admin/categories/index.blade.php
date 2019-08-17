@extends('admin.app')

@section("title") Categories @endsection

@section("header") List Categories @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item active">Categories</div>
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

            <div class="row mt-1">
                <div class="col-md-6 ">
                    <form action="{{route('admin.categories.index')}}">
                        <div class="input-group mb-3">
                            <input value="{{Request::get('name')}}" name="name" class="form-control col-md-10"
                            type="text" placeholder="filter berdasarkan title"/>

                            <div class="input-group-append">
                                <input type="submit"value="Filter" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mr-1">
                <div class="col-md-12 text-right">
                    <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Create Categories</a>
                    <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Published</a>
                    <a href="{{route('admin.categories.trash')}}" class="btn btn-primary">Trash</a>
                </div>
            </div>
            <br>

            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $categorie->title }}</td>
                        <td>{{ $categorie->slug }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['id' => $categorie->id]) }}" class="btn btn-warning">Edit</a>

                            <form onsubmit="return confirm('Move category to trash?')" class="d-inline" action="{{route('admin.categories.destroy', ['id' => $categorie->id ])}}" method="POST">
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

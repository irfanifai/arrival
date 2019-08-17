@extends("admin.app")

@section("title") User @endsection

@section("header") Edit User @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></div>
<div class="breadcrumb-item active">Edit Categories</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">

            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{route('admin.categories.update', ['id'=>$categories->id])}}">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $categories->title }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <input class="btn btn-primary" type="submit" value="Save"/>
                </form>
            </div>
    </div>
</div>
@endsection

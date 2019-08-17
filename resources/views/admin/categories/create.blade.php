@extends("admin.app")

@section("title") Categories @endsection

@section("header") Create Categories @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></div>
<div class="breadcrumb-item active">Create Categories</div>
@endsection

@section("content")
<div class="row">
    <div class="col-6 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Categorie Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="your categories name">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</dislugv>
                        @enderror
                    </div>
                    <input class="btn btn-primary" type="submit" value="Save"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

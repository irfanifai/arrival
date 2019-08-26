@extends("admin.app")

@section("title") Posts @endsection

@section("header") Detail Posts @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></div>
<div class="breadcrumb-item active">Detail Posts</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>ID</th>
                            <td>{{ $posts->id }}</td>
                        </tr>
                        <tr>
                            <th>Author</th>
                            <td>{{ $posts->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Published At</th>
                            <td>{{ $posts->published_at }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $posts->title }}</td>
                        </tr>
                        <tr>
                            <th>Body</th>
                            <td>{!! $posts->body !!}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $posts->category->title }}</td>
                        </tr>
                        <tr>
                            <th>Featured Image</th>
                            <td><img src="{{asset('storage/' . $posts->featured)}}" alt="Featured Image"  height="450" width="865"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


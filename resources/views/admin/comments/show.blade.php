@extends("admin.app")

@section("title") Comment @endsection

@section("header") Detail Comment @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Comments</a></div>
<div class="breadcrumb-item active">Detail Comment</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-header text-white bg-primary font-weight-bold">
                Tilte Post : {{ $comments->post->title }}
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>ID</td>
                        <td>{{ $comments->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $comments->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $comments->email }}</td>
                    </tr>
                    <tr>
                        <td>Comment</td>
                        <td>{{ $comments->body }}</td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>{{ $comments->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $comments->status == 1 ? 'Publish' : 'Hide' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


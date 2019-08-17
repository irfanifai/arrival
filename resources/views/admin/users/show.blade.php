@extends("admin.app")

@section("title") User @endsection

@section("header") Detail User @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></div>
<div class="breadcrumb-item active">Detail User</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    @if($user->avatar)
                        <img class="mr-3" src="{{asset('storage/'. $user->avatar)}}" width="100px" class="rounded-circle author-box-picture">
                        @else
                        <p class="mr-5">No avatar</p>
                        @endif
                    <div class="media-body">
                    <p class="mt-0"><b>Nama</b> : {{ $user->name }}</p>
                    <p class="mt-0"><b>Email</b> : {{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends("admin.app")

@section("title") Show User @endsection

@section("header") Users Detail @endsection

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


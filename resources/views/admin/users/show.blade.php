@extends("admin.app")

@section("title") Pengguna @endsection

@section("header") Detail Pengguna @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('admin.home') }}">Halaman Utama</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Pengguna</a></div>
<div class="breadcrumb-item active">Detail Pengguna</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
            <div class="profile-widget-header">
                @if($user->avatar)
                    <img alt="foto profile pengguna" src="{{ asset($user->avatar) }}" class="rounded-circle profile-widget-picture">
                @else
                    <p class="mr-5">No avatar</p>
                @endif
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Artikel</div>
                        <div class="profile-widget-item-value">{{ $user->post()->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="profile-widget-description">
                <div class="profile-widget-name">{{ $user->name }}
                    <div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div> {{ $user->email }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


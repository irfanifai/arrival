@extends('admin.app')

@section("title") Halaman Utama @endsection

@section("header") Halaman Utama @endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="far fa-newspaper fa-7x"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Artikel</h4>
                </div>
                <div class="card-body">
                {{ \App\Post::count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-success">
            <i class="far fa-comment-alt"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Komentar</h4>
            </div>
            <div class="card-body">
            {{ \App\Comment::count() }}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Pesan</h4>
            </div>
            <div class="card-body">
            {{ \App\Message::count() }}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
            <i class="fas fa-user"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>User</h4>
            </div>
            <div class="card-body">
            {{ \App\User::count() }}
            </div>
        </div>
        </div>
    </div>
</div>

<h2 class="section-title mt-0">All User</h2>
<div class="row text-center">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th>Status</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($user->avatar)
                                <img src="{{ asset($user->avatar) }}" width="50px">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @php
                        $date = $user->created_at;
                        $date = date( "d M Y h:i", strtotime($date));
                        @endphp
                        <td>{{ $date }}</td>
                        <td>
                            @if($user->status == "ACTIVE")
                            <span class="badge badge-success">
                                {{ $user->status }}
                            </span>
                            @else
                            <span class="badge badge-danger">
                                {{ $user->status }}
                            </span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                <tfoot>
                    <tr>
                        <td colspan=10>
                            {{$users->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>

<h2 class="section-title ml-3">Latest Posts Artikel</h2>
<div class="row px-3">
    @foreach($posts as $post)
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card" style="height: 540px;">
                <img src="{{asset($post->featured)}}" class="card-img-top" alt="featured" style="height: 200px;">
                <div class="card-body">
                    <div class="article-title">
                        <p style="height: 10px;"><a href="{{ route('admin.posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></p>
                    </div>
                    @php $text = $post->body; $max = 150; $body = substr($text, 0, $max) . '...'; @endphp
                    <p class="card-text pt-5" style="height: 80px;">{{ strip_tags($body) }}...</p>
                </div>
                <div class="article-cta pt-1 mb-3">
                    <a href="{{ route('admin.posts.show', ['id' => $post->id]) }}">Baca lebih lajut<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

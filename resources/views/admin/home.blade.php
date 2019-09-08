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

<h2 class="section-title">Blog Artikel</h2>
<div class="row">
    @foreach($posts as $post)
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article article-style-b">
            <div class="article-header">
                <div class="article-image" data-background="{{asset('storage/' . $post->featured)}}">
                </div>
            </div>
            <div class="article-details">
                <div class="article-title">
                    <h2><a href="{{ route('admin.posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
                </div>
                @php $text = $post->body; $max = 150; $title = substr($text, 0, $max) . '...'; @endphp
                <p>{{ strip_tags($title) }}</p>
                <div class="article-cta">
                    <a href="{{ route('admin.posts.show', ['id' => $post->id]) }}">Baca lebih lajut<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </article>
    </div>
    @endforeach
</div>
@endsection

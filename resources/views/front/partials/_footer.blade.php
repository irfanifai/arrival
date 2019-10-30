<div class="container foot">
    <div class="col-md-3 ftr_navi ftr">
        <h3>Navigation</h3>
        <ul>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>
            <li><a href="{{ url('/blog') }}">Blog</a></li>
            <li><a href="{{ url('/kontak-kami') }}">Kontak Kami</a></li>
        </ul>
    </div>
    <div class="col-md-3 ftr_navi ftr">
        <h3>Find Me</h3>
        <ul>
            <a href="{{ $setting->so_facebook }}"><i class="fa fa-facebook"></i></a>
            <a href="{{ $setting->so_twitter }}"><i class="fa fa-twitter"></i></a>
            <a href="{{ $setting->so_instagram }}"><i class="fa fa-instagram"></i></a>
        </ul>
    </div>
    <div class="col-md-3 get_in_touch ftr">
        <h3>{{ $setting->title }}</h3>
        <p>{{ $setting->address }}</p>
        <p>{{ $setting->phone }}</p>
        <a href="mailto:mail@">{{ $setting->email }}</a>
    </div>
    <div class="col-md-3 ftr-logo">
        <a href="{{ url('/') }}"><img src="{{ asset('travels-web/images/logo.png') }}" alt="" /></a>
        <p>© 2019 Arrival. All rights  Reserved</a></p>
    </div>
    <div class="clearfix"> </div>
</div>

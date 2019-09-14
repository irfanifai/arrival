<div class="welcome">
	<div class="container">
		<h3>AKTIFITAS</h3>
		<p>Temukan beragam aktivitas yang cocok untuk anda di Indonesia</p>
	</div>
</div>

<div class="container">
    <div class="work-main">
        @foreach ($tujuan->limit(2)->get() as $tujuan)
        <div class="col-md-6 work-wrapper">
            <a href="{{asset($tujuan->featured)}}" class="b-link-stripe b-animate-go swipebox" title="Awesome Trip">
                <img src="{{asset($tujuan->featured)}}" alt="" class="img-responsive">
                <div class="b-wrapper">
                    <h2 class="b-animate b-from-left b-delay03">
                        <i class="glyphicon glyphicon-zoom-in"></i>
                    </h2>
                </div>
            </a><div class="clearfix"> </div>
            <div class="work-details">
                <h3><i class="glyphicon glyphicon-chevron-up"></i>{{ $tujuan->title }}</h3>
                @php
                    $text = $tujuan->body;
                    $max = 200;
                    $body = strip_tags(substr($text, 0, $max) . '.'); @endphp
                <p>{{ $body }}</p>
            </div>
        </div>
        @endforeach
        <div class="clearfix"> </div>
	</div>
</div>

<link rel="stylesheet" href="{{ asset('travels-web/css/swipebox.css') }}">
    <script src="{{ asset('travels-web/js/jquery.swipebox.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
</script>

<!DOCTYPE html>
<html>
<head>
<title>Arrival - @yield("title")</title>
<link rel="icon" href="{{ asset('images/sunset.png') }}" type="image/x-icon">
<!--css-->
<link href="{{ asset('travels-web/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('travels-web/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/front.css') }}" rel="stylesheet" type="text/css" media="all" />
<!--/css-->
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Arrival Web Travel" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- js -->
<script src="{{ asset('travels-web/js/jquery.min.js') }}"> </script>
<script src="{{ asset('travels-web/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('travels-web/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('travels-web/js/easing.js') }}"></script>
<!-- /js -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--/fonts-->
<!--script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!--/script-->
</head>
<body>

<!--header-->
<div class="header">
    @include('front.partials._header')
</div>
<!--/header-->

<div class="banner banner5"></div>

<!--blog-->
    @yield("content")
<!--/blog-->


<!--footer-->
<div class="footer">
    @include('front.partials._footer')
</div>
<!--footer-->

<script type="text/javascript">
		$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<script id="dsq-count-scr" src="//http-arrival-test-8080.disqus.com/count.js" async></script>
<a href="#to-top" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"> </span></a>

</body>
</html>

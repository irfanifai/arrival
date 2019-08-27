<div class="header-nav">
	<div class="container">
		<div class="logo">
			<a href="index.html">
			<img src="{{ asset('travels-web/images/logo1.png') }}" alt="" /></a>
		</div>
		<div class="navigation">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"> </span>
						<span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                    </button>
					</div>
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="{{ Request::is('/') ? 'active' : '' }}">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="{{ Request::is('') ? 'active' : '' }}">
                                <a href="{{ url('') }}">About</a>
                            </li>
                            <li class="{{ Request::is('blog') ? 'active' : '' }}">
                                <a href="{{ url('/blog') }}">Blog</a>
                            </li>
                            <li class="{{ Request::is('') ? 'active' : '' }}">
                                <a href="{{ url('') }}">Contact</a>
                            </li>
                        </ul>
                    <div class="clearfix"></div>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
</div>

<!-- script-for-menu -->
<script>
    $("span.menu").click(function(){
        $(".top-nav ul").slideToggle("slow" , function(){
        });
    });
</script>
<!-- script-for-menu -->

@extends('front.app')

@section("title") Blog @endsection

@section('content')
<div class="single">
	<div class="container" style="margin-top: 30px;">
		{{-- <h3>{{ $post->title }}</h3> --}}

            <div class="single wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                <div class="blog-to1 service_info">

                    <img class="img-responsive sin-on" src="{{asset($post->featured)}}" alt="" style="width: 100%; height: 530px;">
                    <div class="blog-top">
                        <div class="blog-left">
                            @php $date = $post->created_at; $date = date( "d", strtotime($date)); $month = $post->created_at; $month = date( "M", strtotime($month)); @endphp
                            <b>{{ $date }}</b>
                            <span>{{ $month }}</span>
                        </div>
                        <div class="top-blog">
                            <a class="fast" href="{{ url('/blog/' . $post->slug) }}">{{ $post->title }}</a>
                            <p>Posted by <b>{{ $post->user->name }}</b> in <b>{{ $post->category->title }}</b> |<a href="{{ url('/blog/' . $post->slug) }}#disqus_thread"></a></p>
                            <p class="sed text-justify">{!! $post->body !!}</p>
                        <div class="col-md-6 md-in">
                    </div>
                    <div class="clearfix"></div>

                    <div id="disqus_thread" style="margin: 50px 0 100px 0 !Important;"></div>
                        <script>

                        /**
                        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                        var disqus_config = function () {
                        this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = '{{ $post->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };

                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://http-arrival-test-8080.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>

                </div>

            </div>
		</div>
	</div>
</div>
@endsection

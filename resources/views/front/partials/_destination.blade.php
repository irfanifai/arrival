<div class="grid">
    <h4>BLOG TERBARU</h4>
    @foreach ($posts->orderBy('published_at', 'DESC')->limit(6)->get() as $post)
        <figure class="effect-julia">
            <img src="{{asset('storage/' . $post->featured)}}" alt="img21"/>
            <figcaption>
            <span>{{ $post->title }}</span>
                <div>
                    @php
                    $text = $post->body;
                    $max = 200;
                    $body = strip_tags(substr($text, 0, $max) . '.'); @endphp
                    <p>{{ $body }}</p>
                </div>
                <a href="{{ url('/blog/' . $post->slug) }}">View more</a>
            </figcaption>
        </figure>
    @endforeach
    <div class="clearfix"> </div>
</div>

<script src="{{ asset('travels-web/js/responsiveslides.min.js') }}"></script>
<script>
$(function () {
    $("#slider").responsiveSlides({
    auto: true,
    nav: true,
    speed: 1500,
    namespace: "callbacks",
    pager: true,
    });
});
</script>

<div class="slider">
    <div class="container">
        <ul class="rslides" id="slider">
            <li>
            <div class="banner-info">
                <h2>Wonderful Indonesia</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dapibus posuere odio, et dapibus felis pharetra in. Etiam a dictum lorem, sit amet blandit nibh.</p>
            </div>
            </li>
            <li>
                <div class="banner-info">
                <h2>Jelajah Pesona Indonesia</h2>
                <p>Donec imperdiet justo tortor, non feugiat arcu euismod vel. Mauris id risus et ante commodo finibus nec id neque. Integer ac lectus a sapien rutrum suscipit eleifend feugiat massa.</p>
            </div>
            </li>
            <li>
                <div class="banner-info">
                <h2>Indonesia...kenali, cintai!</h2>
                <p>Duis tincidunt est a semper tincidunt. Vivamus nec augue aliquet, iaculis leo in, aliquet lacus. Maecenas sed ipsum sagittis, tempor dui ac, tempus neque.</p>
            </div>
            </li>
        </ul>
    </div>
</div>

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
                <h2>Enjoy Jakarta</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dapibus posuere odio, et dapibus felis pharetra in. Etiam a dictum lorem, sit amet blandit nibh.</p>
            </div>
            </li>
            <li>
                <div class="banner-info">
                <h2>Indonesia...kenali, cintai!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dapibus posuere odio, et dapibus felis pharetra in. Etiam a dictum lorem, sit amet blandit nibh.</p>
            </div>
            </li>
        </ul>
    </div>
</div>

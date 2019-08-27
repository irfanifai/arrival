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
                <p>Catch a glimpse of Indonesia's bewitching attractions without having to put on your shoes and discover the ultimate destination that matches your soul.</p>
            </div>
            </li>
            <li>
                <div class="banner-info">
                <h2>Recreational Travel</h2>
                <p>engineering applied to the planning, design, and control of industrial operations.of a industrial engineering today vikas</p>
            </div>
            </li>
            <li>
                <div class="banner-info">
                <h2>Awesome Trip</h2>
                <p>This small mark has two primary uses: to signify possession or omitted letters.Learn the correct uses of these comm</p>
            </div>
            </li>
        </ul>
    </div>
</div>

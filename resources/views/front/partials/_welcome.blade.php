<div class="container">
    <div class="work-main">
        <div class="col-md-6 work-wrapper">
            <a href="{{ asset('travels-web/images/a1.jpg') }}" class="b-link-stripe b-animate-go swipebox" title="Awesome Trip">
                <img src="{{ asset('travels-web/images/a1.jpg') }}" alt="" class="img-responsive">
                <div class="b-wrapper">
                    <h2 class="b-animate b-from-left b-delay03">
                        <i class="glyphicon glyphicon-zoom-in"></i>
                    </h2>
                </div>
            </a>
            <a href="{{ asset('travels-web/images/a3.jpg') }}" class="b-link-stripe b-animate-go  swipebox"  title="Awesome Trip">
                <img src="{{ asset('travels-web/images/a3.jpg') }}" alt="" class="img-responsive">
                <div class="b-wrapper1">
                    <h2 class="b-animate b-from-left b-delay03">
                        <i class="glyphicon glyphicon-zoom-in"></i>
                    </h2>
                </div>
            </a>
            <div class="work-details">
                <h3><i class="glyphicon glyphicon-chevron-up"></i>Goa Gong Pacitan</h3>
                <p>Goa Gong merupakan salah satu tempat wisata di Pacitan yang memiliki keindahan alam yang sangat menakjubkan. Keindahan Goa Gong terletak pada Staglatit dan Stalagmit yang begitu indah</p>
            </div>
        </div>
        <div class="col-md-6 work-wrapper">
            <a href="{{ asset('travels-web/images/a2.jpg') }}" class="b-link-stripe b-animate-go  swipebox"  title="Awesome Trip">
                <img src="{{ asset('travels-web/images/a2.jpg') }}" alt="" class="img-responsive">
                <div class="b-wrapper">
                    <h2 class="b-animate b-from-left b-delay03">
                        <i class="glyphicon glyphicon-zoom-in"></i>
                    </h2>
                </div>
            </a>
            <div class="work wrk1">
                <div class="work-details wrk">
                    <h3><i class="glyphicon glyphicon-chevron-up"></i>Wisata Taman Nasional Wakatobi</h3>
                    <p>Taman Nasional Wakatobi merupakan salah satu dari 50 taman nasional di Indonesia, yang terletak di kabupaten Wakatobi, Sulawesi Tenggara. Taman nasional ini ditetapkan pada tahun 1996, dengan total area 1,39 juta ha, menyangkut keanekaragaman hayati laut, skala dan kondisi karang; yang menempati salah satu posisi prioritas tertinggi dari konservasi laut di Indonesia. Kedalaman air di taman nasional ini bervariasi, bagian terdalam mencapai 1.044 meter di bawah permukaan air laut. </p>
				</div>
			</div>
        </div>
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

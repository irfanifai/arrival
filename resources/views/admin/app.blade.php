<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Arrival - @yield("title")</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla-master/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla-master/assets/css/style.css') }}">
    <link href="{{ asset('css/back.css') }}" rel="stylesheet" type="text/css" media="all">
</head>

<body>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- Topbar -->
            @include('admin.partials._topbar')

            <!-- Sidebar -->
            @include('admin.partials._sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield("header")</h1>
                        <div class="section-header-breadcrumb">
                            @yield("breadcrumb")
                        </div>
                    </div>

                    <div class="section-body">
                        @yield("content")
                    </div>
                </section>
            </div>
            <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2019 <div class="bullet"></div> Author By <a href="https://arrival.irfanifai.com/">Arrival</a>
            </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{ asset('stisla-master/assets/js/stisla.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/myscript.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/swruegvyym0jmtwzpuh3144t0po7q0ierwl8l4oa4s3h8rgq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({
        selector:'textarea',
        height: 500,
        themes: 'modern',
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    });
    </script>

    <!-- Template JS File -->
    <script src="{{ asset('stisla-master/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla-master/assets/js/custom.js') }}"></script>
</body>
</html>


